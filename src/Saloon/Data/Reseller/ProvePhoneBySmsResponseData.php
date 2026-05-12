<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ProvePhoneBySmsResponseData extends ZadarmaResponseData
{
    public function number(): ?int
    {
        return $this->integer('number');
    }
}
