<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class RequestCallbackResponseData extends ZadarmaResponseData
{
    public function callId(): ?string
    {
        return $this->string('call_id');
    }
}
