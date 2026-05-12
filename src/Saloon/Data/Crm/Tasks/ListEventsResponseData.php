<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListEventsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function events(): array
    {
        return $this->listValue('events');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }
}
