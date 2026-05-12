<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Enums\IvrLanguage;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookResponse;

it('builds redirect webhook responses', function (): void {
    $response = ZadarmaWebhookResponse::redirect('0-1', returnTimeout: 10, rewriteForwardNumber: '+48123123123');

    expect($response->toArray())->toBe([
        'redirect' => '0-1',
        'return_timeout' => 10,
        'rewrite_forward_number' => '+48123123123',
    ])->and($response->jsonSerialize())->toBe($response->toArray());
});

it('builds hangup and caller name webhook responses', function (): void {
    expect(ZadarmaWebhookResponse::hangup()->toArray())->toBe(['hangup' => 1])
        ->and(ZadarmaWebhookResponse::callerName('Acme')->toArray())->toBe(['caller_name' => 'Acme']);
});

it('builds dtmf and ivr playback webhook responses', function (): void {
    expect(ZadarmaWebhookResponse::waitDtmf(5, 2, 4, 'extension', 'hangup')->toArray())->toBe([
        'wait_dtmf' => [
            'timeout' => 5,
            'attempts' => 2,
            'maxdigits' => 4,
            'name' => 'extension',
            'default' => 'hangup',
        ],
    ])->and(ZadarmaWebhookResponse::ivrPlay(123)->withWaitDtmf(3, 1, 1, 'choice')->toArray())->toBe([
        'wait_dtmf' => [
            'timeout' => 3,
            'attempts' => 1,
            'maxdigits' => 1,
            'name' => 'choice',
        ],
        'ivr_play' => '123',
    ]);
});

it('builds spoken ivr webhook responses', function (): void {
    expect(ZadarmaWebhookResponse::ivrSayPopular(1, IvrLanguage::Polish)->toArray())->toBe([
        'ivr_saypopular' => 1,
        'language' => 'pl',
    ])->and(ZadarmaWebhookResponse::ivrSayDigits('12', 'en')->toArray())->toBe([
        'ivr_saydigits' => '12',
        'language' => 'en',
    ])->and(ZadarmaWebhookResponse::ivrSayNumber(123, IvrLanguage::English)->withCallerName('Client')->toArray())->toBe([
        'caller_name' => 'Client',
        'ivr_saynumber' => '123',
        'language' => 'en',
    ]);
});

it('converts webhook builder to a Laravel JSON response', function (): void {
    $response = ZadarmaWebhookResponse::hangup()->toJsonResponse();
    $responsable = ZadarmaWebhookResponse::callerName('Acme')->toResponse(request());

    expect($response->getStatusCode())->toBe(200)
        ->and($response->getData(true))->toBe(['hangup' => 1])
        ->and($responsable->getData(true))->toBe(['caller_name' => 'Acme']);
});
