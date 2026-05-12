<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class LookupNumberResponseData extends ZadarmaResponseData
{
    public function number(): ?string
    {
        return $this->string('number');
    }

    public function operator(): ?string
    {
        return $this->string('operator');
    }

    public function country(): ?string
    {
        return $this->string('country');
    }
}
