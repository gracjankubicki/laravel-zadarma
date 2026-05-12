<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sms;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListTemplatesResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function list(): array
    {
        return $this->listValue('list');
    }
}
