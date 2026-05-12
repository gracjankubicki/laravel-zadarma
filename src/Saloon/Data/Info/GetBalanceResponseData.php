<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetBalanceResponseData extends ZadarmaResponseData
{
    public function balance(): ?float
    {
        return $this->float('balance');
    }

    public function currency(): ?string
    {
        return $this->string('currency');
    }
}
