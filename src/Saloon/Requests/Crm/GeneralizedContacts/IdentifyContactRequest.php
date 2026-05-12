<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\GeneralizedContacts;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\GeneralizedContacts\IdentifyContactResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class IdentifyContactRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/contacts/identify';
    }

    protected function responseDataClass(): string
    {
        return IdentifyContactResponseData::class;
    }
}
