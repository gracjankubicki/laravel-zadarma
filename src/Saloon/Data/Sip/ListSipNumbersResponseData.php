<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sip;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListSipNumbersResponseData extends ZadarmaResponseData
{
    public function left(): ?int
    {
        return $this->integer('left');
    }

    /**
     * @return list<mixed>
     */
    public function sips(): array
    {
        return $this->listValue('sips');
    }
}
