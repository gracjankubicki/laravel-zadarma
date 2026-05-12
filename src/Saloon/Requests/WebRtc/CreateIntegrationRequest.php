<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\WebRtc;

use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\CreateIntegrationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateIntegrationRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::POST;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/webrtc/create/';
    }

    protected function responseDataClass(): string
    {
        return CreateIntegrationResponseData::class;
    }
}
