<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateScenarioResponseData extends ZadarmaResponseData
{
    public function menuId(): ?int
    {
        return $this->integer('menu_id');
    }

    public function scenarioId(): ?int
    {
        return $this->integer('scenario_id');
    }
}
