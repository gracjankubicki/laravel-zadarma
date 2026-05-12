<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateSipResponseData extends ZadarmaResponseData
{
    public function sip(): ?string
    {
        return $this->string('sip');
    }
}
