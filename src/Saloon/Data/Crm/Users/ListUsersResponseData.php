<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListUsersResponseData extends ZadarmaResponseData
{
    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }

    /**
     * @return list<mixed>
     */
    public function users(): array
    {
        return $this->listValue('users');
    }
}
