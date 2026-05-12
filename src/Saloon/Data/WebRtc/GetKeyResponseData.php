<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetKeyResponseData extends ZadarmaResponseData
{
    public function key(): ?string
    {
        return $this->string('key');
    }
}
