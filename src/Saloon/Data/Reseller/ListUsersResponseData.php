<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Reseller;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListUsersResponseData extends ZadarmaResponseData
{
    public function page(): ?int
    {
        return $this->integer('page');
    }

    public function total(): ?int
    {
        return $this->integer('total');
    }

    public function totalPages(): ?int
    {
        return $this->integer('total_pages');
    }

    /**
     * @return list<mixed>
     */
    public function users(): array
    {
        return $this->listValue('users');
    }
}
