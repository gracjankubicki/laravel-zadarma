<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListTariffsResponseData extends ZadarmaResponseData
{
    public function currency(): ?string
    {
        return $this->string('currency');
    }

    /**
     * @return list<mixed>
     */
    public function packageTariffs(): array
    {
        return $this->listValue('package_tariffs');
    }

    /**
     * @return list<mixed>
     */
    public function tariffs(): array
    {
        return $this->listValue('tariffs');
    }
}
