<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class SwitchRedirectionResponseData extends ZadarmaResponseData
{
    public function currentStatus(): ?string
    {
        return $this->string('current_status');
    }

    public function sip(): ?string
    {
        return $this->string('sip');
    }
}
