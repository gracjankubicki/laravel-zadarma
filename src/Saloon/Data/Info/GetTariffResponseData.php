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

    public function isActive(): ?bool
    {
        return $this->boolean('info.is_active');
    }

    public function cost(): ?float
    {
        return $this->float('info.cost');
    }

    public function currency(): ?string
    {
        return $this->string('info.currency');
    }

    public function usedSeconds(): ?int
    {
        return $this->integer('info.used_seconds');
    }

    public function usedSecondsMobile(): ?int
    {
        return $this->integer('info.used_seconds_mobile');
    }

    public function usedSecondsFix(): ?int
    {
        return $this->integer('info.used_seconds_fix');
    }

    public function tariffIdForNextPeriod(): ?int
    {
        return $this->integer('info.tariff_id_for_next_period');
    }

    public function tariffForNextPeriod(): ?string
    {
        return $this->string('info.tariff_for_next_period');
    }
}
