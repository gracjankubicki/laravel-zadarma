<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetUserResponseData extends ZadarmaResponseData
{
    public function avatar(): ?int
    {
        return $this->integer('avatar');
    }

    public function color(): ?string
    {
        return $this->string('color');
    }

    public function colorHex(): ?string
    {
        return $this->string('color_hex');
    }

    /**
     * @return list<mixed>
     */
    public function contacts(): array
    {
        return $this->listValue('contacts');
    }

    public function createdAt(): ?string
    {
        return $this->string('created_at');
    }

    public function device(): ?string
    {
        return $this->string('device');
    }

    public function email(): ?string
    {
        return $this->string('email');
    }

    public function enabled(): ?int
    {
        return $this->integer('enabled');
    }

    public function firstDay(): ?int
    {
        return $this->integer('first_day');
    }

    public function groupId(): ?int
    {
        return $this->integer('group_id');
    }

    public function id(): ?int
    {
        return $this->integer('id');
    }

    public function internalNumber(): ?int
    {
        return $this->integer('internal_number');
    }

    public function isSuperadmin(): ?int
    {
        return $this->integer('is_superadmin');
    }

    public function language(): ?string
    {
        return $this->string('language');
    }

    public function name(): ?string
    {
        return $this->string('name');
    }

    public function pendingEmailChangeRequest(): ?string
    {
        return $this->string('pending_email_change_request');
    }

    public function phoneWidgetLocation(): ?string
    {
        return $this->string('phone_widget_location');
    }

    /**
     * @return list<mixed>
     */
    public function phones(): array
    {
        return $this->listValue('phones');
    }

    public function role(): ?string
    {
        return $this->string('role');
    }

    public function timezone(): ?string
    {
        return $this->string('timezone');
    }
}
