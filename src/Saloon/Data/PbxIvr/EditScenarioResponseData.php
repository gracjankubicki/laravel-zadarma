<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class EditScenarioResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function items(): array
    {
        return $this->listValue('items');
    }
}
