<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ProvePhoneByCallbackResponseData extends ZadarmaResponseData
{
    public function number(): ?int
    {
        return $this->integer('number');
    }
}
