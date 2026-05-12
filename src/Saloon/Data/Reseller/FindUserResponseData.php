<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class FindUserResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function user(): ?array
    {
        return $this->arrayValue('user');
    }
}
