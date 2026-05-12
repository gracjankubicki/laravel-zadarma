<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class UpdateRecordingResponseData extends ZadarmaResponseData
{
    public function email(): ?string
    {
        return $this->string('email');
    }

    public function internalNumber(): ?int
    {
        return $this->integer('internal_number');
    }

    public function recording(): ?string
    {
        return $this->string('recording');
    }

    public function speechRecognition(): ?string
    {
        return $this->string('speech_recognition');
    }
}
