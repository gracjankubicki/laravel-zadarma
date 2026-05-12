<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetTimezoneResponseData extends ZadarmaResponseData
{
    public function timezone(): ?string
    {
        return $this->string('timezone');
    }

    public function dateTime(): ?string
    {
        return $this->string('datetime');
    }

    public function unixTime(): ?int
    {
        return $this->integer('unixtime');
    }
}
