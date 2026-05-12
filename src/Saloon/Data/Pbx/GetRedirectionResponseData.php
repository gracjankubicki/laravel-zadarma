<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetRedirectionResponseData extends ZadarmaResponseData
{
    public function condition(): ?string
    {
        return $this->string('condition');
    }

    public function currentStatus(): ?string
    {
        return $this->string('current_status');
    }

    public function destination(): ?string
    {
        return $this->string('destination');
    }

    public function pbxId(): ?int
    {
        return $this->integer('pbx_id');
    }

    public function pbxName(): ?string
    {
        return $this->string('pbx_name');
    }

    public function type(): ?string
    {
        return $this->string('type');
    }
}
