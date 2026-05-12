<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\GeneralizedContacts;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListContactsResponseData extends ZadarmaResponseData
{
    public function avatar(): ?int
    {
        return $this->integer('avatar');
    }

    public function contactType(): ?string
    {
        return $this->string('contact_type');
    }

    /**
     * @return list<mixed>
     */
    public function contacts(): array
    {
        return $this->listValue('contacts');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function customer(): ?array
    {
        return $this->arrayValue('customer');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function group(): ?array
    {
        return $this->arrayValue('group');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }

    public function name(): ?string
    {
        return $this->string('name');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function phone(): ?array
    {
        return $this->arrayValue('phone');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function position(): ?array
    {
        return $this->arrayValue('position');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function responsible(): ?array
    {
        return $this->arrayValue('responsible');
    }

    public function role(): ?string
    {
        return $this->string('role');
    }

    public function totalCount(): ?int
    {
        return $this->integer('totalCount');
    }

    public function type(): ?string
    {
        return $this->string('type');
    }
}
