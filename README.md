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
```

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

Signature verification is intentionally not enabled until the public Zadarma documentation defines a webhook signature contract.

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

After the GitHub repository is created and tagged, publish the package on Packagist under the same name.
