<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ProlongNumberResponseData extends ZadarmaResponseData
{
    public function number(): ?int
    {
        return $this->integer('number');
    }

    public function stopDate(): ?string
    {
        return $this->string('stop_date');
    }

    /**
     * @return array<array-key, mixed>|null
     */
    public function totalPaid(): ?array
    {
        return $this->arrayValue('total_paid');
    }
}
