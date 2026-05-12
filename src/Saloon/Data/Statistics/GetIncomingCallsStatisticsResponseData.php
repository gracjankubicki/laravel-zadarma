<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Statistics;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetIncomingCallsStatisticsResponseData extends ZadarmaResponseData
{
    public function end(): ?string
    {
        return $this->string('end');
    }

    public function start(): ?string
    {
        return $this->string('start');
    }

    /**
     * @return list<mixed>
     */
    public function stats(): array
    {
        return $this->listValue('stats');
    }
}
