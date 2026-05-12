<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListCurrenciesResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function currencies(): array
    {
        return array_values(array_filter($this->listValue('currencies'), is_string(...)));
    }
}
