<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetRedirectionResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function info(): array
    {
        return $this->listValue('info');
    }
}
