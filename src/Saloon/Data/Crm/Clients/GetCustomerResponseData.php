<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Clients;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetCustomerResponseData extends ZadarmaResponseData
{
    public function address(): ?string
    {
        return $this->string('address');
    }

    public function city(): ?string
    {
        return $this->string('city');
    }

    public function comment(): ?string
    {
        return $this->string('comment');
    }

    /**
     * @return list<mixed>
     */
    public function contacts(): array
    {
        return $this->listValue('contacts');
    }

    public function country(): ?string
    {
        return $this->string('country');
    }

    public function createdAt(): ?string
    {
        return $this->string('created_at');
    }

    public function createdBy(): ?int
    {
        return $this->integer('created_by');
    }

    /**
     * @return list<mixed>
     */
    public function customProperties(): array
    {
        return $this->listValue('custom_properties');
    }

    public function employeesCount(): ?int
    {
        return $this->integer('employees_count');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }

    /**
     * @return list<mixed>
     */
    public function labels(): array
    {
        return $this->listValue('labels');
    }

    public function leadCreatedAt(): ?string
    {
        return $this->string('lead_created_at');
    }

    public function leadCreatedBy(): ?int
    {
        return $this->integer('lead_created_by');
    }

    public function leadSource(): ?string
    {
        return $this->string('lead_source');
    }

    public function name(): ?string
    {
        return $this->string('name');
    }

    /**
     * @return list<mixed>
     */
    public function phones(): array
    {
        return $this->listValue('phones');
    }

    public function responsibleUserId(): ?int
    {
        return $this->integer('responsible_user_id');
    }

    public function type(): ?string
    {
        return $this->string('type');
    }

    /**
     * @return list<mixed>
     */
    public function utms(): array
    {
        return $this->listValue('utms');
    }

    public function website(): ?string
    {
        return $this->string('website');
    }

    public function zip(): ?string
    {
        return $this->string('zip');
    }
}
