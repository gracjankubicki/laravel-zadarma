<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\CheckNumberResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetBalanceResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetPriceResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetTariffResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetTimezoneResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\ListCurrenciesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\ListLanguagesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\ListTariffsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\LookupNumberResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\RequestCallbackResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sms\ListSenderIdsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sms\ListTemplatesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sms\SendSmsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Info\GetBalanceRequest;
use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Illuminate\Support\Str;
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

it('reads payload values through tolerant typed accessors', function (): void {
    $dto = new ZadarmaResponseData([
        'id' => '123',
        'int_value' => 456,
        'price' => '10.50',
        'float_value' => 12.5,
        'real_bool' => true,
        'enabled' => 'true',
        'disabled' => 0,
        'name' => 987,
        'items' => ['one', 'two'],
        'nested' => ['value' => 'ok'],
        'assoc' => ['a' => 'b'],
        'invalid_bool' => 2,
    ], 200);

    expect($dto->has('nested.value'))->toBeTrue()
        ->and($dto->has('nested.missing'))->toBeFalse()
        ->and($dto->get('nested.value'))->toBe('ok')
        ->and($dto->get('missing', 'fallback'))->toBe('fallback')
        ->and($dto->string('name'))->toBe('987')
        ->and($dto->string('assoc'))->toBeNull()
        ->and($dto->integer('id'))->toBe(123)
        ->and($dto->integer('int_value'))->toBe(456)
        ->and($dto->integer('price'))->toBeNull()
        ->and($dto->float('price'))->toBe(10.50)
        ->and($dto->float('float_value'))->toBe(12.5)
        ->and($dto->float('nested'))->toBeNull()
        ->and($dto->boolean('real_bool'))->toBeTrue()
        ->and($dto->boolean('enabled'))->toBeTrue()
        ->and($dto->boolean('disabled'))->toBeFalse()
        ->and($dto->boolean('invalid_bool'))->toBeNull()
        ->and($dto->boolean('assoc'))->toBeNull()
        ->and($dto->arrayValue('assoc'))->toBe(['a' => 'b'])
        ->and($dto->arrayValue('missing'))->toBeNull()
        ->and($dto->listValue('items'))->toBe(['one', 'two'])
        ->and($dto->listValue('assoc'))->toBe([]);
});

it('exposes typed accessors for documented Info responses', function (): void {
    $balance = new GetBalanceResponseData([
        'status' => 'success',
        'balance' => '123.45',
        'currency' => 'USD',
    ], 200);

    expect($balance->balance())->toBe(123.45)
        ->and($balance->currency())->toBe('USD');

    $price = new GetPriceResponseData([
        'info' => [
            'prefix' => '48',
            'description' => 'Poland',
            'price' => '0.12',
            'currency' => 'USD',
        ],
    ], 200);

    expect($price->info())->toBe([
        'prefix' => '48',
        'description' => 'Poland',
        'price' => '0.12',
        'currency' => 'USD',
    ])
        ->and($price->prefix())->toBe('48')
        ->and($price->description())->toBe('Poland')
        ->and($price->price())->toBe(0.12)
        ->and($price->currency())->toBe('USD');

    $timezone = new GetTimezoneResponseData([
        'timezone' => 'Europe/Warsaw',
        'datetime' => '2026-05-12 13:20:00',
        'unixtime' => '1778584800',
    ], 200);

    expect($timezone->timezone())->toBe('Europe/Warsaw')
        ->and($timezone->dateTime())->toBe('2026-05-12 13:20:00')
        ->and($timezone->unixTime())->toBe(1778584800);

    $tariff = new GetTariffResponseData([
        'info' => [
            'tariff_id' => '123',
            'tariff_name' => 'Office',
            'currency' => 'EUR',
        ],
    ], 200);

    expect($tariff->info())->toBe([
        'tariff_id' => '123',
        'tariff_name' => 'Office',
        'currency' => 'EUR',
    ])
        ->and($tariff->tariffId())->toBe(123)
        ->and($tariff->tariffName())->toBe('Office')
        ->and($tariff->currency())->toBe('EUR');
});

it('exposes typed list accessors for documented Info list responses', function (): void {
    $currencies = new ListCurrenciesResponseData([
        'currencies' => ['USD', 'EUR', 123],
    ], 200);

    expect($currencies->currencies())->toBe(['USD', 'EUR']);

    $languages = new ListLanguagesResponseData([
        'languages' => ['en', 'pl', false],
    ], 200);

    expect($languages->languages())->toBe(['en', 'pl']);

    $tariffs = new ListTariffsResponseData([
        'tariffs' => [['id' => 1], ['id' => 2]],
    ], 200);

    expect($tariffs->tariffs())->toBe([['id' => 1], ['id' => 2]]);
});

it('exposes typed accessors for documented Info utility responses', function (): void {
    $checkNumber = new CheckNumberResponseData([
        'number' => 48123123123,
        'is_mobile' => 'yes',
    ], 200);

    expect($checkNumber->number())->toBe('48123123123')
        ->and($checkNumber->isMobile())->toBeTrue();

    $lookupNumber = new LookupNumberResponseData([
        'number' => '48123123123',
        'operator' => 'Operator',
        'country' => 'PL',
    ], 200);

    expect($lookupNumber->number())->toBe('48123123123')
        ->and($lookupNumber->operator())->toBe('Operator')
        ->and($lookupNumber->country())->toBe('PL');

    $callback = new RequestCallbackResponseData([
        'call_id' => 12345,
    ], 200);

    expect($callback->callId())->toBe('12345');
});

it('exposes typed accessors for documented SMS responses', function (): void {
    $sendSms = new SendSmsResponseData([
        'messages' => '2',
        'cost' => '0.24',
        'currency' => 'USD',
        'sms_detalization' => [
            ['senderid' => 'Sender', 'number' => '1234567890', 'cost' => 0.12],
        ],
        'denied_numbers' => [
            ['number' => '0987654321', 'message' => 'Denied'],
        ],
    ], 200);

    expect($sendSms->messages())->toBe(2)
        ->and($sendSms->cost())->toBe(0.24)
        ->and($sendSms->currency())->toBe('USD')
        ->and($sendSms->smsDetalization())->toBe([
            ['senderid' => 'Sender', 'number' => '1234567890', 'cost' => 0.12],
        ])
        ->and($sendSms->deniedNumbers())->toBe([
            ['number' => '0987654321', 'message' => 'Denied'],
        ]);

    $templates = new ListTemplatesResponseData([
        'list' => [
            ['cath_id' => '1', 'title' => 'Category'],
        ],
    ], 200);

    expect($templates->list())->toBe([
        ['cath_id' => '1', 'title' => 'Category'],
    ]);

    $senderIds = new ListSenderIdsResponseData([
        'senders' => ['Teamsale', '1234567890', 999],
    ], 200);

    expect($senderIds->senders())->toBe(['Teamsale', '1234567890']);
});

it('executes every endpoint DTO field accessor without requiring a full payload', function (
    string $group,
    string $requestClass,
    string $dataClass,
): void {
    $class = 'GracjanKubicki\\LaravelZadarma\\Saloon\\Data\\'.$group.'\\'.$dataClass;
    $reflection = new ReflectionClass($class);
    $dto = new $class([], 200);

    foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->getDeclaringClass()->getName() !== $class || $method->getNumberOfRequiredParameters() > 0) {
            continue;
        }

        $dto->{$method->getName()}();
    }

    expect($dto)->toBeInstanceOf(ZadarmaResponseData::class);
})->with(require __DIR__.'/../Fixtures/endpoints.php');

it('keeps documented response accessor metadata aligned with DTO methods', function (): void {
    /** @var array<class-string<ZadarmaResponseData>, array<string, mixed>> $accessors */
    $accessors = require __DIR__.'/../Fixtures/response-accessors.php';

    foreach ($accessors as $class => $fields) {
        expect(class_exists($class))->toBeTrue();

        foreach (array_keys($fields) as $field) {
            expect(method_exists($class, Str::camel((string) $field)))->toBeTrue();
        }
    }
});
