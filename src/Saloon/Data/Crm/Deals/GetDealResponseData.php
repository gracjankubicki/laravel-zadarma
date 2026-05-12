<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetDealResponseData extends ZadarmaResponseData
{
    public function budget(): ?float
    {
        return $this->float('budget');
    }

    public function createdAt(): ?string
    {
        return $this->string('created_at');
    }

    public function createdBy(): ?int
    {
        return $this->integer('created_by');
    }

    public function currency(): ?string
    {
        return $this->string('currency');
    }

    public function customerId(): ?int
    {
        return $this->integer('customer_id');
    }

    public function customerIsLead(): ?int
    {
        return $this->integer('customer_is_lead');
    }

    public function customerName(): ?string
    {
        return $this->string('customer_name');
    }

    public function customerResponsibleUser(): ?int
    {
        return $this->integer('customer_responsible_user');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }

    public function responsibleUser(): ?int
    {
        return $this->integer('responsible_user');
    }

    public function title(): ?string
    {
        return $this->string('title');
    }
}
