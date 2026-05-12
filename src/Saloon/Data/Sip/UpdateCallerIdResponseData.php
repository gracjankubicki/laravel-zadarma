<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class UpdateCallerIdResponseData extends ZadarmaResponseData
{
    public function newCallerId(): ?string
    {
        return $this->string('new_caller_id');
    }

    public function sip(): ?string
    {
        return $this->string('sip');
    }
}
