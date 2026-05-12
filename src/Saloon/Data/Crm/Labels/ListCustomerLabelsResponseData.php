<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Labels;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListCustomerLabelsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function labels(): array
    {
        return $this->listValue('labels');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }
}
