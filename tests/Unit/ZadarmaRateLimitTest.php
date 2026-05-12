<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaRateLimitData;
use GracjanKubicki\LaravelZadarma\Saloon\RateLimits\ZadarmaRateLimitFactory;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Info\GetBalanceRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Statistics\GetPbxStatisticsRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Statistics\GetStatisticsRequest;
use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Illuminate\Support\Facades\Cache;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;
use Saloon\RateLimitPlugin\Exceptions\RateLimitReachedException;
use Saloon\RateLimitPlugin\Limit;

beforeEach(function (): void {
    Cache::store()->clear();

    config()->set('zadarma.rate_limits.enabled', true);
    config()->set('zadarma.rate_limits.store', null);
    config()->set('zadarma.rate_limits.general_per_minute', 100);
    config()->set('zadarma.rate_limits.statistics_per_minute', 3);
    config()->set('zadarma.rate_limits.sleep', false);
});

it('maps Zadarma rate limit response headers onto DTOs', function (): void {
    $connector = new ZadarmaConnector('headers-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make(
            ['status' => 'success', 'balance' => 123.45],
            headers: [
                'X-RateLimit-Limit' => '100',
                'X-RateLimit-Remaining' => '99',
                'X-RateLimit-Reset' => '60',
                'X-Zadarma-Method' => '/v1/info/balance/',
            ],
        ),
    ]));

    $dto = $connector->send(new GetBalanceRequest)->dtoOrFail();

    expect($dto->rateLimit)->toBeInstanceOf(ZadarmaRateLimitData::class)
        ->and($dto->rateLimit?->hasHeaders())->toBeTrue()
        ->and($dto->rateLimit?->limit)->toBe(100)
        ->and($dto->rateLimit?->remaining)->toBe(99)
        ->and($dto->rateLimit?->reset)->toBe(60)
        ->and($dto->rateLimit?->method)->toBe('/v1/info/balance/');
});

it('keeps rate limit metadata empty when Zadarma headers are invalid', function (): void {
    $connector = new ZadarmaConnector('invalid-headers-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make(
            ['status' => 'success'],
            headers: [
                'X-RateLimit-Limit' => 'not-a-number',
            ],
        ),
    ]));

    $rateLimit = $connector->send(new GetBalanceRequest)->dtoOrFail()->rateLimit;

    expect($rateLimit)->toBeInstanceOf(ZadarmaRateLimitData::class)
        ->and($rateLimit?->hasHeaders())->toBeFalse()
        ->and($rateLimit?->limit)->toBeNull()
        ->and($rateLimit?->remaining)->toBeNull()
        ->and($rateLimit?->reset)->toBeNull()
        ->and($rateLimit?->method)->toBeNull();
});

it('detects completely absent Zadarma rate limit headers', function (): void {
    $connector = new ZadarmaConnector('no-headers-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make(['status' => 'success']),
    ]));

    $rateLimit = $connector->send(new GetBalanceRequest)->dtoOrFail()->rateLimit;

    expect($rateLimit)->toBeInstanceOf(ZadarmaRateLimitData::class)
        ->and($rateLimit?->hasHeaders())->toBeFalse();
});

it('configures the connector general rate limit per Zadarma API key', function (): void {
    $connector = new ZadarmaConnector(
        key: 'connector-key',
        secret: 'test-secret',
        generalRateLimitPerMinute: 42,
        rateLimitSleep: true,
    );

    $limits = $connector->getLimits();
    $names = array_map(static fn (Limit $limit): string => $limit->getName(), $limits);

    expect($names)->toContain('zadarma:'.sha1('connector-key').':general')
        ->and($limits[0]->getShouldSleep())->toBeTrue();
});

it('uses configured Laravel cache store and limit values from the factory', function (): void {
    config()->set('zadarma.rate_limits.store', 'array');
    config()->set('zadarma.rate_limits.general_per_minute', 77);
    config()->set('zadarma.rate_limits.statistics_per_minute', 5);
    config()->set('zadarma.rate_limits.sleep', true);

    $limit = ZadarmaRateLimitFactory::limit(
        requests: ZadarmaRateLimitFactory::generalPerMinute(),
        name: 'general',
        sleep: ZadarmaRateLimitFactory::sleep(),
    );

    expect(ZadarmaRateLimitFactory::enabled())->toBeTrue()
        ->and(ZadarmaRateLimitFactory::statisticsPerMinute())->toBe(5)
        ->and(ZadarmaRateLimitFactory::store())->not->toBeNull()
        ->and($limit->getName())->toBe('saloon_rate_limiter:general')
        ->and($limit->getShouldSleep())->toBeTrue();
});

it('applies the lower shared statistics rate limit to statistics requests', function (): void {
    config()->set('zadarma.rate_limits.statistics_per_minute', 1);

    $connector = new ZadarmaConnector('statistics-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make(['status' => 'success', 'stats' => []]),
        MockResponse::make(['status' => 'success', 'stats' => []]),
    ]));

    $request = new GetStatisticsRequest;

    $connector->send($request);

    $statisticLimitNames = array_map(static fn (Limit $limit): string => $limit->getName(), $request->getLimits());

    expect($statisticLimitNames)->toContain('zadarma:'.sha1('statistics-key').':statistics:statistics');
    expect(fn (): Response => $connector->send(new GetPbxStatisticsRequest))->toThrow(RateLimitReachedException::class);
});

it('keeps a generic statistics limiter prefix before a request is booted by a connector', function (): void {
    $request = new GetStatisticsRequest;

    $names = array_map(static fn (Limit $limit): string => $limit->getName(), $request->getLimits());

    expect($names)->toContain('zadarma:statistics:statistics');
});

it('can disable Zadarma rate limiting through configuration and connector settings', function (): void {
    config()->set('zadarma.rate_limits.enabled', false);
    config()->set('zadarma.rate_limits.statistics_per_minute', 1);

    $connector = new ZadarmaConnector(
        key: 'disabled-key',
        secret: 'test-secret',
        baseUrl: 'https://api.example.test',
        rateLimitsEnabled: false,
    );

    $connector->withMockClient(new MockClient([
        MockResponse::make(['status' => 'success', 'stats' => []]),
        MockResponse::make(['status' => 'success', 'stats' => []]),
    ]));

    $connector->send(new GetStatisticsRequest);
    $response = $connector->send(new GetPbxStatisticsRequest);

    expect($response->status())->toBe(200);
});

it('detects Zadarma 429 responses through the Saloon rate limit plugin', function (): void {
    $connector = new ZadarmaConnector('too-many-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make(['status' => 'error', 'message' => 'Too many requests'], 429, [
            'Retry-After' => '2',
        ]),
    ]));

    expect(fn (): Response => $connector->send(new GetBalanceRequest))->toThrow(RateLimitReachedException::class);
});
