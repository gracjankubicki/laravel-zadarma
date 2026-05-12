<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhook;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookEvent;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookVerifier;
use Illuminate\Http\Request;

it('creates webhook payload from array and resolves known event', function (): void {
    $webhook = ZadarmaWebhook::fromArray([
        'event' => 'notify_start',
        'caller_id' => '48123123123',
        'nested' => ['value' => 'ok'],
    ]);

    expect($webhook->event)->toBe(ZadarmaWebhookEvent::NotifyStart)
        ->and($webhook->eventName())->toBe('notify_start')
        ->and($webhook->is(ZadarmaWebhookEvent::NotifyStart))->toBeTrue()
        ->and($webhook->is('notify_start'))->toBeTrue()
        ->and($webhook->is('sms'))->toBeFalse()
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

it('does not pretend webhook signature verification exists', function (): void {
    $verifier = new ZadarmaWebhookVerifier;

    expect($verifier->supportsSignatureVerification())->toBeFalse();

    $verifier->verify();
})->throws(LogicException::class, 'webhook signature contract');
