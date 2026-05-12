<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListAvailableNumbersResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function numbers(): array
    {
        return $this->listValue('numbers');
    }
}
