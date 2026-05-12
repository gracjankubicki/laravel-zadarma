<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Verify;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateVerificationResponseData extends ZadarmaResponseData
{
    public function requestId(): ?string
    {
        return $this->string('request_id');
    }
}
