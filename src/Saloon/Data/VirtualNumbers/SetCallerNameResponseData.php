<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class SetCallerNameResponseData extends ZadarmaResponseData
{
    public function callerName(): ?string
    {
        return $this->string('caller_name');
    }

    public function number(): ?int
    {
        return $this->integer('number');
    }
}
