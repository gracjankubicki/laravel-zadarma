<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Employees;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetCustomerEmployeeResponseData extends ZadarmaResponseData
{
    public function comment(): ?string
    {
        return $this->string('comment');
    }

    /**
     * @return list<mixed>
     */
    public function contacts(): array
    {
        return $this->listValue('contacts');
    }

    public function customerId(): ?int
    {
        return $this->integer('customer_id');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }

    public function name(): ?string
    {
        return $this->string('name');
    }

    /**
     * @return list<mixed>
     */
    public function phones(): array
    {
        return $this->listValue('phones');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function position(): ?array
    {
        return $this->arrayValue('position');
    }

    public function positionTitle(): ?string
    {
        return $this->string('position_title');
    }
}
