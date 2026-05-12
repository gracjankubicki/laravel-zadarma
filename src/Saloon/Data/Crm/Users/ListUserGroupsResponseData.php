<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListUserGroupsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function groups(): array
    {
        return $this->listValue('groups');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }
}
