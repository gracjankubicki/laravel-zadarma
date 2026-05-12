<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Clients;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients\CreateCustomerResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateCustomerRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::POST;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/customers';
    }

    protected function responseDataClass(): string
    {
        return CreateCustomerResponseData::class;
    }
}
