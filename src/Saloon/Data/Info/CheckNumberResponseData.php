<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CheckNumberResponseData extends ZadarmaResponseData
{
    public function number(): ?string
    {
        return $this->string('number');
    }

    public function isMobile(): ?bool
    {
        return $this->boolean('is_mobile');
    }

    public function from(): ?string
    {
        return $this->string('from');
    }

    public function lang(): ?string
    {
        return $this->string('lang');
    }

    public function time(): ?string
    {
        return $this->string('time');
    }

    public function to(): ?string
    {
        return $this->string('to');
    }
}
