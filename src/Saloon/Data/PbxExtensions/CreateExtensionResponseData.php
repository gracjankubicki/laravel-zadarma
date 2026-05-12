<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateExtensionResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function numbers(): array
    {
        return $this->listValue('numbers');
    }
}
