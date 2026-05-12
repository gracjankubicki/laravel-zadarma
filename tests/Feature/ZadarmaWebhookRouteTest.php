<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Events\ZadarmaWebhookReceived;
use GracjanKubicki\LaravelZadarma\Http\Controllers\ZadarmaWebhookController;
use GracjanKubicki\LaravelZadarma\Http\Middleware\ZadarmaWebhookIpAllowlist;
use GracjanKubicki\LaravelZadarma\LaravelZadarmaServiceProvider;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookEvent;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookVerifier;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Event;
use Symfony\Component\HttpFoundation\Response;

it('does not register webhook route by default', function (): void {
    expect(app(Router::class)->getRoutes()->getByName('zadarma.webhook'))->toBeNull();
});

it('registers webhook route when enabled', function (): void {
    registerZadarmaWebhookRoute();

    $routes = app(Router::class)->getRoutes();
    $routes->refreshNameLookups();
    $route = $routes->getByName('zadarma.webhook');

    expect($route)->not->toBeNull()
        ->and($route?->uri())->toBe('zadarma/webhook')
        ->and($route?->methods())->toContain('GET', 'POST');
});

it('adds IP allowlist middleware to the optional webhook route when enabled', function (): void {
    config()->set('zadarma.webhooks.ip_allowlist.enabled', true);

    registerZadarmaWebhookRoute();

    $routes = app(Router::class)->getRoutes();
    $routes->refreshNameLookups();
    $route = $routes->getByName('zadarma.webhook');

    expect($route?->gatherMiddleware())->toContain(ZadarmaWebhookIpAllowlist::class);
});

it('returns zd echo challenge when webhook route is enabled', function (): void {
    $response = callZadarmaWebhookController(Request::create('/zadarma/webhook', 'GET', [
        'zd_echo' => 'challenge-token',
    ]));

    expect($response->getStatusCode())->toBe(Response::HTTP_OK)
        ->and($response->getContent())->toBe('challenge-token');
});

it('dispatches a webhook received event for incoming payloads', function (): void {
    Event::fake([ZadarmaWebhookReceived::class]);

    $response = callZadarmaWebhookController(Request::create('/zadarma/webhook', 'POST', [
        'event' => 'SMS',
        'message' => 'hello',
    ]));

    expect($response->getStatusCode())->toBe(Response::HTTP_NO_CONTENT);

    Event::assertDispatched(
        ZadarmaWebhookReceived::class,
        fn (ZadarmaWebhookReceived $event): bool => $event->webhook->is(ZadarmaWebhookEvent::Sms)
            && $event->webhook->get('message') === 'hello',
    );
});

it('rejects invalid webhook signatures when verification is enabled', function (): void {
    Event::fake([ZadarmaWebhookReceived::class]);
    config()->set('zadarma.webhooks.signature_verification', true);

    $request = Request::create('/zadarma/webhook', 'POST', [
        'event' => 'NOTIFY_START',
        'caller_id' => '48123123123',
        'called_did' => '48999111222',
        'call_start' => '2026-05-12 13:00:00',
    ]);
    $request->headers->set('Signature', 'invalid');

    $response = callZadarmaWebhookController($request);

    expect($response->getStatusCode())->toBe(Response::HTTP_FORBIDDEN);

    Event::assertNotDispatched(ZadarmaWebhookReceived::class);
});

it('accepts valid webhook signatures when verification is enabled', function (): void {
    Event::fake([ZadarmaWebhookReceived::class]);
    config()->set('zadarma.webhooks.signature_verification', true);

    $payload = [
        'event' => 'NOTIFY_START',
        'caller_id' => '48123123123',
        'called_did' => '48999111222',
        'call_start' => '2026-05-12 13:00:00',
    ];

    $signature = (new ZadarmaWebhookVerifier)->signature($payload, 'test-secret');
    $request = Request::create('/zadarma/webhook', 'POST', $payload);
    $request->headers->set('Signature', $signature);

    $response = callZadarmaWebhookController($request);

    expect($response->getStatusCode())->toBe(Response::HTTP_NO_CONTENT);

    Event::assertDispatched(ZadarmaWebhookReceived::class);
});

it('allows webhook requests from configured Zadarma IP ranges', function (): void {
    config()->set('zadarma.webhooks.ip_allowlist.enabled', true);

    $request = Request::create('/zadarma/webhook', 'POST', server: ['REMOTE_ADDR' => '185.45.152.41']);
    $response = (new ZadarmaWebhookIpAllowlist)->handle(
        $request,
        fn (): Response => response('', Response::HTTP_NO_CONTENT),
    );

    expect($response->getStatusCode())->toBe(Response::HTTP_NO_CONTENT);
});

it('skips webhook IP allowlist when middleware is disabled', function (): void {
    config()->set('zadarma.webhooks.ip_allowlist.enabled', false);

    $request = Request::create('/zadarma/webhook', 'POST', server: ['REMOTE_ADDR' => '203.0.113.10']);
    $response = (new ZadarmaWebhookIpAllowlist)->handle(
        $request,
        fn (): Response => response('', Response::HTTP_NO_CONTENT),
    );

    expect($response->getStatusCode())->toBe(Response::HTTP_NO_CONTENT);
});

it('rejects webhook requests when configured IP ranges are empty', function (): void {
    config()->set('zadarma.webhooks.ip_allowlist.enabled', true);
    config()->set('zadarma.webhooks.ip_allowlist.ranges', []);

    $request = Request::create('/zadarma/webhook', 'POST', server: ['REMOTE_ADDR' => '185.45.152.41']);
    $response = (new ZadarmaWebhookIpAllowlist)->handle(
        $request,
        fn (): Response => response('', Response::HTTP_NO_CONTENT),
    );

    expect($response->getStatusCode())->toBe(Response::HTTP_FORBIDDEN);
});

it('rejects webhook requests outside configured Zadarma IP ranges', function (): void {
    config()->set('zadarma.webhooks.ip_allowlist.enabled', true);

    $request = Request::create('/zadarma/webhook', 'POST', server: ['REMOTE_ADDR' => '203.0.113.10']);
    $response = (new ZadarmaWebhookIpAllowlist)->handle(
        $request,
        fn (): Response => response('', Response::HTTP_NO_CONTENT),
    );

    expect($response->getStatusCode())->toBe(Response::HTTP_FORBIDDEN);
});

function registerZadarmaWebhookRoute(): void
{
    config()->set('zadarma.webhooks.routes.enabled', true);

    new LaravelZadarmaServiceProvider(app())->boot();
}

function callZadarmaWebhookController(Request $request): Response
{
    return (new ZadarmaWebhookController)(
        $request,
        new ZadarmaWebhookVerifier,
    );
}
