<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class LookupNumberResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function info(): ?array
    {
        return $this->arrayValue('info');
    }

    public function mcc(): ?string
    {
        return $this->string('info.mcc');
    }

    public function mnc(): ?string
    {
        return $this->string('info.mnc');
    }

    public function mccName(): ?string
    {
        return $this->string('info.mccName');
    }

    public function mncName(): ?string
    {
        return $this->string('info.mncName');
    }

    public function ported(): ?bool
    {
        return $this->boolean('info.ported');
    }

    public function roaming(): ?bool
    {
        return $this->boolean('info.roaming');
    }

    public function errorDescription(): ?string
    {
        return $this->string('info.errorDescription');
    }

    public function description(): ?string
    {
        return $this->string('description');
    }

    /**
     * @return list<mixed>
     */
    public function result(): array
    {
        return $this->listValue('result');
    }

    public function number(): ?string
    {
        return $this->string('number');
    }

    public function operator(): ?string
    {
        return $this->string('operator');
    }

    public function country(): ?string
    {
        return $this->string('country');
    }

    public function success(): ?bool
    {
        return $this->boolean('success');
    }
}
