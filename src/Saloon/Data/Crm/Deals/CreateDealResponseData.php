<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateDealResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function deal(): ?array
    {
        return $this->arrayValue('deal');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }
}
