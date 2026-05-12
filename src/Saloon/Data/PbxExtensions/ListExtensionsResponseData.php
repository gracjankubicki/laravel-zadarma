<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListExtensionsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function numbers(): array
    {
        return $this->listValue('numbers');
    }

    public function pbxId(): ?int
    {
        return $this->integer('pbx_id');
    }
}
