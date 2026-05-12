<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListCustomerEmployeesResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function employees(): array
    {
        return $this->listValue('employees');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }
}
