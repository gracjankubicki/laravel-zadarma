# Laravel Zadarma

Laravel SDK for the [Zadarma API](https://zadarma.com/en/support/api/#intro), built on [Saloon](https://docs.saloon.dev/).

The package targets PHP 8.5, Laravel 12/13, Pest 4, Saloon 4 and endpoint-specific DTOs.

## Installation

```bash
composer require gracjankubicki/laravel-zadarma
```

Publish the config:

```bash
php artisan vendor:publish --tag=zadarma-config
```

Configure credentials:

```env
ZADARMA_KEY=your-api-key
ZADARMA_SECRET=your-api-secret
ZADARMA_BASE_URL=https://api.zadarma.com
```

## Usage

Use the Laravel facade:

```php
use GracjanKubicki\LaravelZadarma\Facades\Zadarma;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Info\GetBalanceRequest;

$response = Zadarma::send(new GetBalanceRequest);

$balance = $response->dtoOrFail();
```

Or use the Saloon connector directly:

```php
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Sms\SendSmsRequest;
use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;

$connector = new ZadarmaConnector(
    key: config('zadarma.key'),
    secret: config('zadarma.secret'),
);

$response = $connector->send(new SendSmsRequest([
    'number' => '48123123123',
    'message' => 'Hello from Laravel',
]));
```

Every request returns an endpoint-specific DTO through Saloon:

```php
$dto = $response->dtoOrFail();

$dto->statusCode;
$dto->status;
$dto->message;
$dto->payload;
$dto->rateLimit?->remaining;
```

DTOs keep the raw payload available and add a tolerant typed accessor layer:

```php
$dto->get('nested.value');
$dto->string('customer.name');
$dto->integer('messages');
$dto->float('cost');
$dto->boolean('is_mobile');
$dto->arrayValue('info');
$dto->listValue('senders');
```

Endpoint DTOs also expose field-level methods for documented response keys:

```php
use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\GetBalanceResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Data\Sms\SendSmsResponseData;

/** @var GetBalanceResponseData $balance */
$balance->balance();
$balance->currency();

/** @var SendSmsResponseData $sms */
$sms->messages();
$sms->cost();
$sms->smsDetalization();
```

Typed request values can be passed inside the existing request parameter array:

```php
use GracjanKubicki\LaravelZadarma\Enums\CallInfoNotification;
use GracjanKubicki\LaravelZadarma\Enums\ZadarmaBoolean;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx\SetCallInfoNotificationsRequest;

new SetCallInfoNotificationsRequest([
    CallInfoNotification::NotifyStart->value => ZadarmaBoolean::True,
    CallInfoNotification::NotifyEnd->value => false,
]);
```

## Rate Limits

The SDK uses Saloon's rate-limit plugin. Defaults:

- general Zadarma API methods: `100/min`;
- statistics methods: `3/min` by default, configurable to match your account/docs.

```env
ZADARMA_RATE_LIMITS_ENABLED=true
ZADARMA_RATE_LIMITS_STORE=redis
ZADARMA_RATE_LIMITS_GENERAL_PER_MINUTE=100
ZADARMA_RATE_LIMITS_STATISTICS_PER_MINUTE=3
ZADARMA_RATE_LIMITS_SLEEP=false
```

When the limit is reached, Saloon throws `RateLimitReachedException` by default. For queue jobs, use Saloon's `ApiRateLimited` middleware. See [Rate limits](docs/rate-limits.md).

## Endpoint Coverage

This package contains request classes and DTO classes for the full endpoint matrix listed in the Zadarma documentation:

- Info
- SIP
- Statistics
- PBX
- PBX extensions
- PBX IVR
- Speech recognition
- Virtual numbers
- Groups of documents
- Reseller
- SMS
- WebRTC
- eSIM
- Verify
- Teamsale CRM: clients, source tags, labels, additional features, timeline, employees, leads, users, contacts, deals, deal feed, tasks, calls and files

Webhook payload helpers are included as a separate incoming-payload layer. They are not Saloon requests.

## Webhooks

Webhook helpers parse incoming Zadarma payloads without treating webhooks as outgoing Saloon requests:

```php
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhook;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookEvent;

$webhook = ZadarmaWebhook::fromRequest($request);

if ($webhook->is(ZadarmaWebhookEvent::NotifyStart)) {
    $callerId = $webhook->get('caller_id');
}
```

The package also includes an optional Laravel route for simple webhook ingestion. It is disabled by default because it exposes a public endpoint:

```php
// config/zadarma.php
'webhooks' => [
    'signature_verification' => true,

    'routes' => [
        'enabled' => true,
        'path' => 'zadarma/webhook',
        'name' => 'zadarma.webhook',
        'middleware' => [],
    ],
],
```

When enabled, the route:

- handles Zadarma's `GET ?zd_echo=...` challenge;
- accepts `POST` webhook payloads;
- dispatches `GracjanKubicki\LaravelZadarma\Events\ZadarmaWebhookReceived`;
- optionally verifies the `Signature` header for documented webhook event signatures.

For `NOTIFY_START` and `NOTIFY_IVR`, Zadarma can use the HTTP response to dynamically route the current call. In that case, define your own application route and use `ZadarmaWebhook::fromRequest($request)` directly so your controller can return the required call-control response.

```php
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookResponse;

return ZadarmaWebhookResponse::ivrPlay(123)
    ->withWaitDtmf(timeout: 5, attempts: 2, maxDigits: 1, name: 'main_menu');
```

Zadarma recommends limiting access to webhook URLs to `185.45.152.40/30`. The optional route can add the built-in allowlist middleware:

```php
'webhooks' => [
    'ip_allowlist' => [
        'enabled' => true,
        'ranges' => ['185.45.152.40/30'],
    ],
],
```

## Examples

- [Info](docs/info.md)
- [SMS](docs/sms.md)
- [PBX](docs/pbx.md)
- [Webhooks](docs/webhooks.md)
- [Teamsale CRM](docs/crm.md)
- [Documents](docs/documents.md)
- [Rate limits](docs/rate-limits.md)
- [Release](docs/release.md)

## Development

```bash
composer install
composer test
composer test:coverage
composer format:test
composer rector:test
composer analyse
```

Coverage is intentionally strict:

```bash
composer test:coverage
```

This runs Pest with `--coverage --min=100`.

## Release

The intended public package name is:

```text
gracjankubicki/laravel-zadarma
```

Composer package versions are published from Git tags. To publish a new version, run the `Release` workflow from GitHub Actions with a semantic version tag:

```bash
gh workflow run release.yml --repo gracjankubicki/laravel-zadarma -f version=v1.0.0 -f prerelease=false
```

The workflow validates the package, creates the Git tag, creates a GitHub Release and lets the configured Packagist GitHub webhook update the Composer package.
