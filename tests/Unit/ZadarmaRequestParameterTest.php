<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Enums\CallDisposition;
use GracjanKubicki\LaravelZadarma\Enums\CallInfoNotification;
use GracjanKubicki\LaravelZadarma\Enums\IvrLanguage;
use GracjanKubicki\LaravelZadarma\Enums\RedirectType;
use GracjanKubicki\LaravelZadarma\Enums\SwitchState;
use GracjanKubicki\LaravelZadarma\Enums\WebhookHook;
use GracjanKubicki\LaravelZadarma\Enums\ZadarmaBoolean;
use GracjanKubicki\LaravelZadarma\Saloon\Parameters\ZadarmaDateRange;
use GracjanKubicki\LaravelZadarma\Saloon\Parameters\ZadarmaParameterValue;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx\SetWebhookHooksRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxIvr\CreateIvrRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Sip\SwitchRedirectionRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Statistics\GetStatisticsRequest;

it('normalizes typed parameter values for query parameters and signatures', function (): void {
    $request = new GetStatisticsRequest([
        'range' => new ZadarmaDateRange('2026-05-01 00:00:00', '2026-05-02 00:00:00'),
        'created_at' => new DateTimeImmutable('2026-05-03 10:11:12'),
        'only_billable' => true,
        'status' => CallDisposition::Answered,
    ]);

    expect($request->query()->all())->toBe([
        'format' => 'json',
        'start' => '2026-05-01 00:00:00',
        'end' => '2026-05-02 00:00:00',
        'created_at' => '2026-05-03 10:11:12',
        'only_billable' => 'true',
        'status' => 'answered',
    ])->and($request->signatureParameters())->toBe($request->query()->all());
});

it('does not expand parameter value objects with numeric keys', function (): void {
    $request = new GetStatisticsRequest([
        'values' => new class implements ZadarmaParameterValue
        {
            /**
             * @return array<int|string, string>
             */
            public function toZadarmaParameterValue(): array
            {
                return [1 => 'first', 'second' => 'second'];
            }
        },
    ]);

    expect($request->query()->all())->toBe([
        'format' => 'json',
        'values' => [1 => 'first', 'second' => 'second'],
    ]);
});

it('normalizes typed parameter values for form body payloads', function (): void {
    $request = new SetWebhookHooksRequest([
        WebhookHook::Sms->value => ZadarmaBoolean::True,
        WebhookHook::SpeechRecognition->value => false,
        'events' => [
            CallInfoNotification::NotifyStart,
            CallInfoNotification::NotifyIvr,
        ],
    ]);

    expect($request->body()->all())->toBe([
        'format' => 'json',
        'sms' => 'true',
        'speech_recognition' => 'false',
        'events' => [
            'notify_start',
            'notify_ivr',
        ],
    ]);
});

it('keeps nested arrays while normalizing enum values inside them', function (): void {
    $request = new CreateIvrRequest([
        'menu' => [
            'language' => IvrLanguage::Polish,
            'enabled' => ZadarmaBoolean::fromBool(true),
        ],
    ]);

    expect($request->body()->all())->toBe([
        'format' => 'json',
        'menu' => [
            'language' => 'pl',
            'enabled' => 'true',
        ],
    ]);
});

it('exposes common request enum values used by Zadarma payloads', function (): void {
    $request = new SwitchRedirectionRequest([
        'status' => SwitchState::On,
        'type' => RedirectType::Phone,
    ]);

    expect($request->body()->all())->toBe([
        'format' => 'json',
        'status' => 'on',
        'type' => 'phone',
    ])->and(ZadarmaBoolean::False->toBool())->toBeFalse();
});
