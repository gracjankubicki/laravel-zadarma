<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetTariffResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function info(): ?array
    {
        return $this->arrayValue('info');
    }

    public function tariffId(): ?int
    {
        return $this->integer('info.tariff_id');
    }

    public function tariffName(): ?string
    {
        return $this->string('info.tariff_name');
    }

    public function currency(): ?string
    {
        return $this->string('info.currency');
    }
}
