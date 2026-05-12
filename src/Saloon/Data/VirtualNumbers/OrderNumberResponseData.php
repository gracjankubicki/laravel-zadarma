<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class OrderNumberResponseData extends ZadarmaResponseData
{
    public function isActivated(): ?bool
    {
        return $this->boolean('is_activated');
    }

    public function isReserved(): ?bool
    {
        return $this->boolean('is_reserved');
    }

    public function number(): ?int
    {
        return $this->integer('number');
    }
}
