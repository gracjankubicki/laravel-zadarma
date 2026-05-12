<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhook;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookEvent;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookVerifier;
use Illuminate\Http\Request;

it('creates webhook payload from array and resolves known event', function (): void {
    $webhook = ZadarmaWebhook::fromArray([
        'event' => 'NOTIFY_START',
        'caller_id' => '48123123123',
        'nested' => ['value' => 'ok'],
    ]);

    expect($webhook->event)->toBe(ZadarmaWebhookEvent::NotifyStart)
        ->and($webhook->eventName())->toBe('NOTIFY_START')
        ->and($webhook->is(ZadarmaWebhookEvent::NotifyStart))->toBeTrue()
        ->and($webhook->is('notify_start'))->toBeTrue()
        ->and($webhook->is('SMS'))->toBeFalse()
        ->and($webhook->get('caller_id'))->toBe('48123123123')
        ->and($webhook->get('nested.value'))->toBe('ok')
        ->and($webhook->get('missing', 'fallback'))->toBe('fallback');
});

it('keeps unknown webhook events as raw payload without guessing', function (): void {
    $webhook = ZadarmaWebhook::fromArray([
        'event' => 'future_event',
    ]);

    expect($webhook->event)->toBeNull()
        ->and($webhook->eventName())->toBeNull()
        ->and($webhook->is('future_event'))->toBeFalse();
});

it('creates webhook payload from Laravel request', function (): void {
    $request = Request::create('/zadarma/webhook', 'POST', [
        'event' => 'sms',
        'message' => 'hello',
    ]);

    $webhook = ZadarmaWebhook::fromRequest($request);

    expect($webhook->event)->toBe(ZadarmaWebhookEvent::Sms)
        ->and($webhook->get('message'))->toBe('hello');
});

it('creates webhook signatures for documented call events', function (): void {
    $verifier = new ZadarmaWebhookVerifier;

    $payload = [
        'event' => 'NOTIFY_START',
        'caller_id' => '48123123123',
        'called_did' => '48999111222',
        'call_start' => '2026-05-12 13:00:00',
    ];

    $expected = base64_encode(hash_hmac('sha1', '48123123123489991112222026-05-12 13:00:00', 'test-secret'));

    expect($verifier->supportsSignatureVerification())->toBeTrue()
        ->and($verifier->signature($payload, 'test-secret'))->toBe($expected)
        ->and($verifier->verify($payload, $expected, 'test-secret'))->toBeTrue()
        ->and($verifier->verify($payload, 'invalid', 'test-secret'))->toBeFalse();
});

it('creates webhook signatures for documented result based events', function (): void {
    $verifier = new ZadarmaWebhookVerifier;

    $payload = [
        'event' => 'SMS',
        'result' => '{"caller_id":"48123123123","text":"hello"}',
    ];

    $expected = base64_encode(hash_hmac('sha1', '{"caller_id":"48123123123","text":"hello"}', 'test-secret'));

    expect($verifier->signature($payload, 'test-secret'))->toBe($expected)
        ->and($verifier->verify($payload, $expected, 'test-secret'))->toBeTrue();
});

it('verifies signatures from Laravel requests', function (): void {
    $verifier = new ZadarmaWebhookVerifier;
    $request = Request::create('/zadarma/webhook', 'POST', [
        'event' => 'SMS',
        'result' => '{"text":"hello"}',
    ]);

    $signature = $verifier->signature($request->all(), 'test-secret');

    $request->headers->set('Signature', $signature);

    expect($verifier->verifyRequest($request, 'test-secret'))->toBeTrue();
});

it('rejects Laravel webhook requests without signature header', function (): void {
    $request = Request::create('/zadarma/webhook', 'POST', [
        'event' => 'SMS',
        'result' => '{"text":"hello"}',
    ]);

    expect((new ZadarmaWebhookVerifier)->verifyRequest($request, 'test-secret'))->toBeFalse();
});

it('returns null signature for payloads without string event', function (): void {
    expect((new ZadarmaWebhookVerifier)->signature(['event' => 123], 'test-secret'))->toBeNull();
});

it('casts scalar signature payload values', function (): void {
    $verifier = new ZadarmaWebhookVerifier;

    $payload = [
        'event' => 'NOTIFY_RECORD',
        'pbx_call_id' => 123,
        'call_id_with_rec' => true,
    ];

    $expected = base64_encode(hash_hmac('sha1', '1231', 'test-secret'));

    expect($verifier->signature($payload, 'test-secret'))->toBe($expected);
});

it('does not verify unsupported or incomplete webhook signatures', function (): void {
    $verifier = new ZadarmaWebhookVerifier;

    expect($verifier->signature(['event' => 'FUTURE_EVENT'], 'test-secret'))->toBeNull()
        ->and($verifier->signature(['event' => 'NOTIFY_START'], 'test-secret'))->toBeNull()
        ->and($verifier->verify(['event' => 'FUTURE_EVENT'], 'signature', 'test-secret'))->toBeFalse();
});
