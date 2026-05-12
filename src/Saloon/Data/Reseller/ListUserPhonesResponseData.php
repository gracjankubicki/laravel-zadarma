<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListUserPhonesResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function list(): array
    {
        return $this->listValue('list');
    }
}
