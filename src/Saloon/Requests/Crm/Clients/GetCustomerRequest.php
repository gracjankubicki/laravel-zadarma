<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Clients;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients\GetCustomerResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetCustomerRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string|int $cId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/customers/'.rawurlencode((string) $this->cId).'';
    }

    protected function responseDataClass(): string
    {
        return GetCustomerResponseData::class;
    }
}
