<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetWebhooksResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function hooks(): ?array
    {
        return $this->arrayValue('hooks');
    }

    public function url(): ?string
    {
        return $this->string('url');
    }
}
