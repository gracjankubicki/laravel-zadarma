# Documents

```php
use GracjanKubicki\LaravelZadarma\Facades\Zadarma;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Documents\ListGroupsRequest;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\Documents\UploadDocumentRequest;

$groups = Zadarma::send(new ListGroupsRequest)->dtoOrFail();

$groups->groups();

$upload = Zadarma::send(new UploadDocumentRequest([
    'group_id' => 123,
    'type' => 'passport',
    'number' => '+48123123123',
    'file' => base64_encode(file_get_contents(storage_path('app/passport.jpg'))),
]))->dtoOrFail();

$upload->docName();
$upload->message;
```
