<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class DeleteCallInfoUrlResponseData extends ZadarmaResponseData
{
    public function url(): ?string
    {
        return $this->string('url');
    }
}
