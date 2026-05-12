<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\DealFeed;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListDealFeedResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function items(): array
    {
        return $this->listValue('items');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }
}
