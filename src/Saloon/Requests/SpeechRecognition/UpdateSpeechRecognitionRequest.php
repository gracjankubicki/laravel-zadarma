<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\SpeechRecognition;

use GracjanKubicki\LaravelZadarma\Saloon\Data\SpeechRecognition\UpdateSpeechRecognitionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateSpeechRecognitionRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

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
        return UpdateSpeechRecognitionResponseData::class;
    }
}
