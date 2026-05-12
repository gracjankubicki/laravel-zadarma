<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\AdditionalFeatures;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListCustomerCustomPropertiesResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function customProperties(): array
    {
        return $this->listValue('customProperties');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }
}
