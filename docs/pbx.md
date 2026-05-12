# PBX

```php
use GracjanKubicki\LaravelZadarma\Enums\CallInfoNotification;
use GracjanKubicki\LaravelZadarma\Enums\ZadarmaBoolean;
use GracjanKubicki\LaravelZadarma\Facades\Zadarma;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx\RequestRecordRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx\SetCallInfoNotificationsRequest;

$records = Zadarma::send(new RequestRecordRequest([
    'call_id' => '1439981389.2702773',
]))->dtoOrFail();

$records->link();
$records->links();
$records->lifetimeTill();

Zadarma::send(new SetCallInfoNotificationsRequest([
    CallInfoNotification::NotifyStart->value => ZadarmaBoolean::True,
    CallInfoNotification::NotifyEnd->value => ZadarmaBoolean::True,
]));
```
