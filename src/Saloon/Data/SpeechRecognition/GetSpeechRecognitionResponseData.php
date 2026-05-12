<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\SpeechRecognition;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetSpeechRecognitionResponseData extends ZadarmaResponseData
{
    public function lang(): ?string
    {
        return $this->string('lang');
    }

    /**
     * @return list<mixed>
     */
    public function otherLangs(): array
    {
        return $this->listValue('otherLangs');
    }

    /**
     * @return list<mixed>
     */
    public function phrases(): array
    {
        return $this->listValue('phrases');
    }

    public function recognitionStatus(): ?string
    {
        return $this->string('recognitionStatus');
    }

    /**
     * @return list<mixed>
     */
    public function words(): array
    {
        return $this->listValue('words');
    }
}
