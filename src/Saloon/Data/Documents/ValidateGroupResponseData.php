<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Documents;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class ValidateGroupResponseData extends ZadarmaResponseData
{
    public function isAddressMatch(): ?bool
    {
        return $this->boolean('is_address_match');
    }

    public function isDocumentsUploaded(): ?bool
    {
        return $this->boolean('is_documents_uploaded');
    }

    public function isDocumentsVerified(): ?bool
    {
        return $this->boolean('is_documents_verified');
    }

    public function isInformationMatch(): ?bool
    {
        return $this->boolean('is_information_match');
    }
}
