<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Leads;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateLeadResponseData extends ZadarmaResponseData
{
    public function id(): ?int
    {
        return $this->integer('id');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function lead(): ?array
    {
        return $this->arrayValue('lead');
    }
}
