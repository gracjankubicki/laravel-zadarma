<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Documents;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ListFilesResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function documents(): array
    {
        return $this->listValue('documents');
    }
}
