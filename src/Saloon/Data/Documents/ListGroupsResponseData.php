<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Documents;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListGroupsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function groups(): array
    {
        return $this->listValue('groups');
    }
}
