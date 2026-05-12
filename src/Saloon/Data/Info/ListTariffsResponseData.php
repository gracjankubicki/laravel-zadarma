<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListTariffsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function tariffs(): array
    {
        return $this->listValue('tariffs');
    }
}
