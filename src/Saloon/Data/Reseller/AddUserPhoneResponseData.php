<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class AddUserPhoneResponseData extends ZadarmaResponseData
{
    public function id(): ?int
    {
        return $this->integer('id');
    }

    public function isProved(): ?bool
    {
        return $this->boolean('is_proved');
    }

    public function number(): ?int
    {
        return $this->integer('number');
    }
}
