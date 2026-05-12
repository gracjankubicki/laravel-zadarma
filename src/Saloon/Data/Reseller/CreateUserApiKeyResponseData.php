<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateUserApiKeyResponseData extends ZadarmaResponseData
{
    public function key(): ?string
    {
        return $this->string('key');
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
