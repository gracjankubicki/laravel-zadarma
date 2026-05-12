<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\ClientTimeline;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListCustomerFeedResponseData extends ZadarmaResponseData
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
