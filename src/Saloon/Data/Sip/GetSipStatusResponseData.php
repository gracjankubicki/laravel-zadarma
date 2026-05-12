<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetSipStatusResponseData extends ZadarmaResponseData
{
    public function isOnline(): ?bool
    {
        return $this->boolean('is_online');
    }

    public function sip(): ?string
    {
        return $this->string('sip');
    }
}
