<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class DeleteRecordRequestResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function deletedFiles(): array
    {
        return $this->listValue('deleted_files');
    }

    public function fileName(): ?string
    {
        return $this->string('file_name');
    }
}
