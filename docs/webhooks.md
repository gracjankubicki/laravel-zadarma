# Webhooks

Enable the optional route only when you want the package to own the public webhook endpoint.

```php
// config/zadarma.php
'webhooks' => [
    'signature_verification' => true,

    'ip_allowlist' => [
        'enabled' => true,
        'ranges' => ['185.45.152.40/30'],
    ],

    'routes' => [
        'enabled' => true,
        'path' => 'zadarma/webhook',
        'name' => 'zadarma.webhook',
        'middleware' => [],
    ],
],
```

For dynamic call control in `NOTIFY_START` and `NOTIFY_IVR`, use an application route and return a builder response:

```php
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhook;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookEvent;
use GracjanKubicki\LaravelZadarma\Webhooks\ZadarmaWebhookResponse;
use Illuminate\Http\Request;

Route::post('/zadarma/call-control', function (Request $request) {
    $webhook = ZadarmaWebhook::fromRequest($request);

    if ($webhook->is(ZadarmaWebhookEvent::NotifyStart)) {
        return ZadarmaWebhookResponse::ivrPlay(123)
            ->withWaitDtmf(timeout: 5, attempts: 2, maxDigits: 1, name: 'main_menu');
    }

    if ($webhook->is(ZadarmaWebhookEvent::NotifyIvr)) {
        return ZadarmaWebhookResponse::redirect('0-1', returnTimeout: 10);
    }

    return response()->noContent();
});
```
