<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class UpdateEventResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function event(): ?array
    {
        return $this->arrayValue('event');
    }
}
