<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sms;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class SendSmsResponseData extends ZadarmaResponseData
{
    public function messages(): ?int
    {
        return $this->integer('messages');
    }

    public function cost(): ?float
    {
        return $this->float('cost');
    }

    public function currency(): ?string
    {
        return $this->string('currency');
    }

    /**
     * @return list<mixed>
     */
    public function smsDetalization(): array
    {
        return $this->listValue('sms_detalization');
    }

    /**
     * @return list<mixed>
     */
    public function deniedNumbers(): array
    {
        return $this->listValue('denied_numbers');
    }
}
