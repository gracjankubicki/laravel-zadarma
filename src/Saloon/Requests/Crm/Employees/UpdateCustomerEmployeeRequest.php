<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Employees;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees\UpdateCustomerEmployeeResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateCustomerEmployeeRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string|int $cId,
        public readonly string|int $eId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/customers/'.rawurlencode((string) $this->cId).'/employees/'.rawurlencode((string) $this->eId).'';
    }

    protected function responseDataClass(): string
    {
        return UpdateCustomerEmployeeResponseData::class;
    }
}
