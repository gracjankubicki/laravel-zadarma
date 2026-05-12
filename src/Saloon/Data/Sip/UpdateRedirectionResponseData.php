<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class UpdateRedirectionResponseData extends ZadarmaResponseData
{
    public function destination(): ?string
    {
        return $this->string('destination');
    }

    public function sip(): ?string
    {
        return $this->string('sip');
    }
}
