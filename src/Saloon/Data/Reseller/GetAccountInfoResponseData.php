<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetAccountInfoResponseData extends ZadarmaResponseData
{
    public function balance(): ?float
    {
        return $this->float('balance');
    }

    public function credit(): ?float
    {
        return $this->float('credit');
    }

    public function currency(): ?string
    {
        return $this->string('currency');
    }

    public function resellerFee(): ?float
    {
        return $this->float('reseller_fee');
    }

    public function userFee(): ?float
    {
        return $this->float('user_fee');
    }
}
