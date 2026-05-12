<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListLeadsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function leads(): array
    {
        return $this->listValue('leads');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }

    public function uncategorizedCount(): ?int
    {
        return $this->integer('uncategorizedCount');
    }
}
