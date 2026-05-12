<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Esim;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListOrdersResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function orders(): array
    {
        return $this->listValue('orders');
    }
}
