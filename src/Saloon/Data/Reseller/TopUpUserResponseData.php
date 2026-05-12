<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class TopUpUserResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function resellerWithdraw(): ?array
    {
        return $this->arrayValue('reseller_withdraw');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function userTopup(): ?array
    {
        return $this->arrayValue('user_topup');
    }
}
