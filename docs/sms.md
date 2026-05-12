# SMS

```php
use GracjanKubicki\LaravelZadarma\Facades\Zadarma;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Sms\SendSmsRequest;

$sms = Zadarma::send(new SendSmsRequest([
    'number' => '48123123123',
    'message' => 'Hello from Laravel',
    'sender_id' => 'Company',
]))->dtoOrFail();

$sms->messages();
$sms->cost();
$sms->currency();
$sms->smsDetalization();
$sms->deniedNumbers();
```
