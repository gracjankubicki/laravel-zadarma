<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateCustomerResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function customer(): ?array
    {
        return $this->arrayValue('customer');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }
}
