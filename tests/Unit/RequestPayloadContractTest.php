<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Enums\CallInfoNotification;
use GracjanKubicki\LaravelZadarma\Enums\IvrLanguage;
use GracjanKubicki\LaravelZadarma\Enums\WebhookHook;
use GracjanKubicki\LaravelZadarma\Enums\ZadarmaBoolean;
use GracjanKubicki\LaravelZadarma\Saloon\Parameters\ZadarmaDateRange;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Clients\CreateCustomerRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Documents\UploadDocumentRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx\SetCallInfoNotificationsRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx\SetWebhookHooksRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxIvr\CreateScenarioRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Reseller\TransferMoneyRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Sms\SendSmsRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Statistics\GetPbxStatisticsRequest;
use Saloon\Enums\Method;

it('serializes document upload payloads as form parameters', function (): void {
    $request = new UploadDocumentRequest([
        'group_id' => 123,
        'type' => 'passport',
        'file' => 'base64-file-content',
    ]);

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->resolveEndpoint())->toBe('/v1/documents/upload/')
        ->and($request->body()->all())->toBe([
            'format' => 'json',
            'group_id' => 123,
            'type' => 'passport',
            'file' => 'base64-file-content',
        ]);
});

it('serializes PBX IVR payloads with typed language values', function (): void {
    $request = new CreateScenarioRequest([
        'menu_id' => 1,
        'title' => 'Main menu',
        'language' => IvrLanguage::Polish,
        'numbers' => [
            ['number' => 100, 'delay' => 0, 'duration' => 20],
        ],
    ]);

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->resolveEndpoint())->toBe('/v1/pbx/ivr/scenario/create/')
        ->and($request->body()->all())->toBe([
            'format' => 'json',
            'menu_id' => 1,
            'title' => 'Main menu',
            'language' => 'pl',
            'numbers' => [
                ['number' => 100, 'delay' => 0, 'duration' => 20],
            ],
        ]);
});

it('serializes webhook hook and call-info notification payloads', function (): void {
    $hooks = new SetWebhookHooksRequest([
        WebhookHook::NumberLookup->value => ZadarmaBoolean::True,
        WebhookHook::Sms->value => false,
    ]);

    $notifications = new SetCallInfoNotificationsRequest([
        CallInfoNotification::NotifyStart->value => true,
        CallInfoNotification::NotifyAnswer->value => ZadarmaBoolean::False,
    ]);

    expect($hooks->resolveEndpoint())->toBe('/v1/pbx/webhooks/hooks/')
        ->and($hooks->body()->all())->toBe([
            'format' => 'json',
            'number_lookup' => 'true',
            'sms' => 'false',
        ])
        ->and($notifications->resolveEndpoint())->toBe('/v1/pbx/callinfo/notifications/')
        ->and($notifications->body()->all())->toBe([
            'format' => 'json',
            'notify_start' => 'true',
            'notify_answer' => 'false',
        ]);
});

it('keeps nested CRM payload contracts intact', function (): void {
    $request = new CreateCustomerRequest([
        'customer' => [
            'name' => 'Good Company',
            'status' => 'company',
            'type' => 'client',
            'phones' => [
                ['type' => 'work', 'phone' => '+44123456789'],
            ],
        ],
    ]);

    expect($request->resolveEndpoint())->toBe('/customers')
        ->and($request->body()->all())->toBe([
            'format' => 'json',
            'customer' => [
                'name' => 'Good Company',
                'status' => 'company',
                'type' => 'client',
                'phones' => [
                    ['type' => 'work', 'phone' => '+44123456789'],
                ],
            ],
        ]);
});

it('serializes reseller form payloads without flattening nested arrays', function (): void {
    $request = new TransferMoneyRequest([
        'user_id' => 123,
        'amount' => 10.50,
        'metadata' => [
            'source' => 'billing-adjustment',
        ],
    ]);

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->resolveEndpoint())->toBe('/v1/reseller/account/money_transfer/')
        ->and($request->body()->all())->toBe([
            'format' => 'json',
            'user_id' => 123,
            'amount' => 10.50,
            'metadata' => [
                'source' => 'billing-adjustment',
            ],
        ]);
});

it('serializes SMS form payloads and statistics query payloads', function (): void {
    $sms = new SendSmsRequest([
        'number' => '48123123123',
        'message' => 'Hello',
    ]);

    $statistics = new GetPbxStatisticsRequest([
        'range' => new ZadarmaDateRange('2026-05-01 00:00:00', '2026-05-02 00:00:00'),
    ]);

    expect($sms->body()->all())->toBe([
        'format' => 'json',
        'number' => '48123123123',
        'message' => 'Hello',
    ])
        ->and($statistics->query()->all())->toBe([
            'format' => 'json',
            'start' => '2026-05-01 00:00:00',
            'end' => '2026-05-02 00:00:00',
        ]);
});
