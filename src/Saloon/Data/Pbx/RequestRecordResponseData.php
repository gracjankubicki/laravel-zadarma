<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class RequestRecordResponseData extends ZadarmaResponseData
{
    public function lifetimeTill(): ?string
    {
        return $this->string('lifetime_till');
    }

    public function link(): ?string
    {
        return $this->string('link');
    }

    /**
     * @return list<mixed>
     */
    public function links(): array
    {
        return $this->listValue('links');
    }
}
