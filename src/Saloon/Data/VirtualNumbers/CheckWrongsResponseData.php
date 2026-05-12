<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CheckWrongsResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function info(): ?array
    {
        return $this->arrayValue('info');
    }
}
