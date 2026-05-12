<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetCallInfoResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function notifications(): ?array
    {
        return $this->arrayValue('notifications');
    }

    public function url(): ?string
    {
        return $this->string('url');
    }
}
