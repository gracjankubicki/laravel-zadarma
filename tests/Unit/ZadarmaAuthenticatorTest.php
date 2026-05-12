<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Saloon\Auth\ZadarmaAuthenticator;
use Saloon\Enums\Method;
use Saloon\Http\Connector;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;

it('creates Zadarma authorization signature using official algorithm', function (): void {
    $authenticator = new ZadarmaAuthenticator('test-key', 'test-secret');

    $parameters = [
        'z' => 'last',
        'format' => 'json',
        'a' => 'first',
    ];

    $sorted = $parameters;
    ksort($sorted);
    $query = http_build_query($sorted, '', '&', PHP_QUERY_RFC1738);
    $expected = base64_encode(hash_hmac('sha1', '/v1/info/balance/'.$query.md5($query), 'test-secret'));

    expect($authenticator->signature('/v1/info/balance/', $parameters))->toBe($expected);
});

it('ignores object values when creating signatures', function (): void {
    $authenticator = new ZadarmaAuthenticator('test-key', 'test-secret');

    $withObject = $authenticator->signature('/v1/documents/upload/', [
        'format' => 'json',
        'file' => new stdClass,
    ]);

    $withoutObject = $authenticator->signature('/v1/documents/upload/', [
        'format' => 'json',
    ]);

    expect($withObject)->toBe($withoutObject);
});

it('does not sign requests outside Zadarma request contract', function (): void {
    $connector = new class extends Connector
    {
        #[Override]
        public function resolveBaseUrl(): string
        {
            return 'https://example.com';
        }
    };

    $request = new class extends Request
    {
        #[Override]
        protected Method $method = Method::GET;

        #[Override]
        public function resolveEndpoint(): string
        {
            return '/ping';
        }
    };

    $pendingRequest = new PendingRequest($connector, $request);

    new ZadarmaAuthenticator('test-key', 'test-secret')->set($pendingRequest);

    expect($pendingRequest->headers()->get('Authorization'))->toBeNull();
});
