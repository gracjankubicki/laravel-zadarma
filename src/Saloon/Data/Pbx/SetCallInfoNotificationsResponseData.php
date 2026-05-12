<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class SetCallInfoNotificationsResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function notifications(): ?array
    {
        return $this->arrayValue('notifications');
    }
}
