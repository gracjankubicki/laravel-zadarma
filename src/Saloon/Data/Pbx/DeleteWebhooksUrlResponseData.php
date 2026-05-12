<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class DeleteWebhooksUrlResponseData extends ZadarmaResponseData
{
    public function url(): ?string
    {
        return $this->string('url');
    }
}
