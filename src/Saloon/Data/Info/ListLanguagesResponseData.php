<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListLanguagesResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function languages(): array
    {
        return array_values(array_filter($this->listValue('languages'), is_string(...)));
    }
}
