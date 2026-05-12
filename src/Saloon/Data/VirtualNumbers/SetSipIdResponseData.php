<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class SetSipIdResponseData extends ZadarmaResponseData
{
    public function number(): ?int
    {
        return $this->integer('number');
    }

    public function sipId(): ?string
    {
        return $this->string('sip_id');
    }
}
