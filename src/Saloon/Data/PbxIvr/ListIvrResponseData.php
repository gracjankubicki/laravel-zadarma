<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListIvrResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function ivrs(): array
    {
        return $this->listValue('ivrs');
    }

    public function pbxId(): ?int
    {
        return $this->integer('pbx_id');
    }
}
