<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Esim;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListPackagesResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function packages(): array
    {
        return $this->listValue('packages');
    }
}
