<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class UpdateExtensionPasswordResponseData extends ZadarmaResponseData
{
    public function number(): ?int
    {
        return $this->integer('number');
    }

    public function pbxId(): ?int
    {
        return $this->integer('pbx_id');
    }
}
