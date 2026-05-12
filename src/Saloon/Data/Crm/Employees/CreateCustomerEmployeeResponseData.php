<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateCustomerEmployeeResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function employee(): ?array
    {
        return $this->arrayValue('employee');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }
}
