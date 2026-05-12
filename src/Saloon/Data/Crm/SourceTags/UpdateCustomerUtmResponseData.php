<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class UpdateCustomerUtmResponseData extends ZadarmaResponseData
{
    /**
     * @return array<array-key, mixed>|null
     */
    public function utm(): ?array
    {
        return $this->arrayValue('utm');
    }
}
