<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetPriceResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function info(): ?array
    {
        return $this->arrayValue('info');
    }

    public function prefix(): ?string
    {
        return $this->string('info.prefix');
    }

    public function description(): ?string
    {
        return $this->string('info.description');
    }

    public function price(): ?float
    {
        return $this->float('info.price');
    }

    public function currency(): ?string
    {
        return $this->string('info.currency');
    }
}
