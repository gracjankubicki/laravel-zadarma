<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetIntegrationResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function domains(): array
    {
        return $this->listValue('domains');
    }

    public function isExists(): ?bool
    {
        return $this->boolean('is_exists');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function settings(): ?array
    {
        return $this->arrayValue('settings');
    }
}
