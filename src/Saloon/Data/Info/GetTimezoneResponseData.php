<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetTimezoneResponseData extends ZadarmaResponseData
{
    public function datetime(): ?string
    {
        return $this->string('datetime');
    }

    public function timezone(): ?string
    {
        return $this->string('timezone');
    }

    public function unixtime(): ?int
    {
        return $this->integer('unixtime');
    }
}
