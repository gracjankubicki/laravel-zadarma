<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\SpeechRecognition;

use GracjanKubicki\LaravelZadarma\Saloon\Data\SpeechRecognition\GetSpeechRecognitionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetSpeechRecognitionRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/speech_recognition/';
    }

    protected function responseDataClass(): string
    {
        return GetSpeechRecognitionResponseData::class;
    }
}
