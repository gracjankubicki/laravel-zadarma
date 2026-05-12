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
}
