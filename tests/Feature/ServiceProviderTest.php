<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Facades\Zadarma as ZadarmaFacade;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Info\GetBalanceRequest;
use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use GracjanKubicki\LaravelZadarma\Zadarma;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('registers the connector and manager in the container', function (): void {
    expect(app(ZadarmaConnector::class))->toBeInstanceOf(ZadarmaConnector::class)
        ->and(app(Zadarma::class))->toBeInstanceOf(Zadarma::class)
        ->and(app('zadarma'))->toBeInstanceOf(Zadarma::class);
});

it('sends requests through the facade', function (): void {
    app(ZadarmaConnector::class)->withMockClient(new MockClient([
        MockResponse::make(['status' => 'success']),
    ]));

    $response = ZadarmaFacade::send(new GetBalanceRequest);

    expect($response->json('status'))->toBe('success');
});

it('exposes the connector through the manager', function (): void {
    expect(app(Zadarma::class)->connector())->toBeInstanceOf(ZadarmaConnector::class);
});
