<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Labels;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateCustomerLabelResponseData extends ZadarmaResponseData
{
    public function count(): ?int
    {
        return $this->integer('count');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }

    public function label(): ?string
    {
        return $this->string('label');
    }
}
