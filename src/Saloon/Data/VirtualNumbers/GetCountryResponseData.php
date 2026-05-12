<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetCountryResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function info(): array
    {
        return $this->listValue('info');
    }
}
