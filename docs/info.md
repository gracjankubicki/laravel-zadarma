# Info

```php
use GracjanKubicki\LaravelZadarma\Facades\Zadarma;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Info\GetBalanceRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Info\GetPriceRequest;

$balance = Zadarma::send(new GetBalanceRequest)->dtoOrFail();

$balance->balance();
$balance->currency();

$price = Zadarma::send(new GetPriceRequest([
    'number' => '442037691880',
]))->dtoOrFail();

$price->prefix();
$price->description();
$price->price();
```
