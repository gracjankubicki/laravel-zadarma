# Teamsale CRM

CRM request classes use the same Saloon connector and return endpoint DTOs.

```php
use GracjanKubicki\LaravelZadarma\Facades\Zadarma;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Clients\CreateCustomerRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Clients\ListCustomersRequest;

$created = Zadarma::send(new CreateCustomerRequest([
    'customer' => [
        'name' => 'Good Company',
        'status' => 'company',
        'type' => 'client',
        'responsible_user_id' => 20,
        'phones' => [
            ['type' => 'work', 'phone' => '+44123456789'],
        ],
    ],
]))->dtoOrFail();

$created->id();

$customers = Zadarma::send(new ListCustomersRequest([
    'limit' => 50,
    'offset' => 0,
]))->dtoOrFail();

$customers->id();
$customers->name();
$customers->phones();
```
