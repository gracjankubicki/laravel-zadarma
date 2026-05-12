<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetUserApiKeyResponseData extends ZadarmaResponseData
{
    public function allowReset(): ?string
    {
        return $this->string('allow_reset');
    }

    public function key(): ?string
    {
        return $this->string('key');
    }

    public function lastRequestDatetime(): ?string
    {
        return $this->string('last_request_datetime');
    }

    public function secret(): ?string
    {
        return $this->string('secret');
    }

    public function userId(): ?int
    {
        return $this->integer('user_id');
    }
}
