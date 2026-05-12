<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Sms;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListSenderIdsResponseData extends ZadarmaResponseData
{
    /**
     * @return list<string>
     */
    public function senders(): array
    {
        return array_values(array_filter($this->listValue('senders'), is_string(...)));
    }
}
