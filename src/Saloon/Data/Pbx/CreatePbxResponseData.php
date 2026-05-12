<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreatePbxResponseData extends ZadarmaResponseData
{
    public function stopDatetime(): ?string
    {
        return $this->string('stop_datetime');
    }
}
