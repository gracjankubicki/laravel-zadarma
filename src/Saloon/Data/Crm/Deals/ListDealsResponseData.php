<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListDealsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function deals(): array
    {
        return $this->listValue('deals');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }
}
