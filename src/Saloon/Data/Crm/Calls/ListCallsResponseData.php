<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Calls;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListCallsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function calls(): array
    {
        return $this->listValue('calls');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }
}
