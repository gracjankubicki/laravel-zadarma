<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetAutoprolongationResponseData extends ZadarmaResponseData
{
    public function autoprolongation(): ?string
    {
        return $this->string('autoprolongation');
    }

    public function number(): ?int
    {
        return $this->integer('number');
    }
}
