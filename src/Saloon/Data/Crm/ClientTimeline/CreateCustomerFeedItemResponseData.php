<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\ClientTimeline;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class CreateCustomerFeedItemResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function attachedFiles(): array
    {
        return $this->listValue('attached_files');
    }

    public function content(): ?string
    {
        return $this->string('content');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }

    public function time(): ?string
    {
        return $this->string('time');
    }

    public function type(): ?string
    {
        return $this->string('type');
    }

    public function userId(): ?int
    {
        return $this->integer('user_id');
    }

    public function userName(): ?string
    {
        return $this->string('user_name');
    }
}
