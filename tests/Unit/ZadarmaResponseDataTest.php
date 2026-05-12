<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Info\GetBalanceRequest;
use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('maps successful JSON response to base DTO data', function (): void {
    $connector = new ZadarmaConnector('test-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make(['status' => 'success', 'balance' => 123.45]),
    ]));

    $dto = $connector->send(new GetBalanceRequest)->dtoOrFail();

    expect($dto)
        ->toBeInstanceOf(ZadarmaResponseData::class)
        ->and($dto->statusCode)->toBe(200)
        ->and($dto->status)->toBe('success')
        ->and($dto->message)->toBeNull()
        ->and($dto->payload)->toHaveKey('balance', 123.45)
        ->and($dto->successfulApiStatus())->toBeTrue();
});

it('preserves error message and api status in DTO data', function (): void {
    $connector = new ZadarmaConnector('test-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make(['status' => 'error', 'message' => 'Invalid request']),
    ]));

    $dto = $connector->send(new GetBalanceRequest)->dto();

    expect($dto->status)
        ->toBe('error')
        ->and($dto->message)->toBe('Invalid request')
        ->and($dto->successfulApiStatus())->toBeFalse();
});

it('wraps scalar JSON responses in body payload', function (): void {
    $connector = new ZadarmaConnector('test-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make('"plain response"'),
    ]));

    $dto = $connector->send(new GetBalanceRequest)->dtoOrFail();

    expect($dto->payload)->toBe(['body' => '"plain response"'])
        ->and($dto->status)->toBeNull()
        ->and($dto->message)->toBeNull()
        ->and($dto->successfulApiStatus())->toBeTrue();
});
