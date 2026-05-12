<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetExtensionInfoResponseData extends ZadarmaResponseData
{
    public function callerId(): ?string
    {
        return $this->string('caller_id');
    }

    public function callerIdAppChange(): ?bool
    {
        return $this->boolean('caller_id_app_change');
    }

    public function callerIdByDirection(): ?bool
    {
        return $this->boolean('caller_id_by_direction');
    }

    public function ipRestriction(): ?string
    {
        return $this->string('ip_restriction');
    }

    public function lines(): ?int
    {
        return $this->integer('lines');
    }

    public function name(): ?string
    {
        return $this->string('name');
    }

    public function number(): ?int
    {
        return $this->integer('number');
    }

    public function pbxId(): ?int
    {
        return $this->integer('pbx_id');
    }

    public function recordEmail(): ?string
    {
        return $this->string('record_email');
    }

    public function recordStore(): ?string
    {
        return $this->string('record_store');
    }

    public function supervisorStatus(): ?int
    {
        return $this->integer('supervisor_status');
    }
}
