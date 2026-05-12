<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Tasks;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetEventResponseData extends ZadarmaResponseData
{
    public function allDay(): ?bool
    {
        return $this->boolean('allDay');
    }

    public function callDone(): ?string
    {
        return $this->string('call_done');
    }

    public function completed(): ?string
    {
        return $this->string('completed');
    }

    public function completedComment(): ?string
    {
        return $this->string('completed_comment');
    }

    public function createdBy(): ?int
    {
        return $this->integer('created_by');
    }

    /**
     * @return list<mixed>
     */
    public function customers(): array
    {
        return $this->listValue('customers');
    }

    public function description(): ?string
    {
        return $this->string('description');
    }

    public function end(): ?string
    {
        return $this->string('end');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }

    /**
     * @return list<mixed>
     */
    public function members(): array
    {
        return $this->listValue('members');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function phone(): ?array
    {
        return $this->arrayValue('phone');
    }

    public function responsibleUser(): ?int
    {
        return $this->integer('responsible_user');
    }

    public function start(): ?string
    {
        return $this->string('start');
    }

    public function title(): ?string
    {
        return $this->string('title');
    }

    public function type(): ?string
    {
        return $this->string('type');
    }
}
