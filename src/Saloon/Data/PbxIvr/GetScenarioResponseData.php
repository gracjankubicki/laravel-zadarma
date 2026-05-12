<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetScenarioResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function scenarios(): array
    {
        return $this->listValue('scenarios');
    }
}
