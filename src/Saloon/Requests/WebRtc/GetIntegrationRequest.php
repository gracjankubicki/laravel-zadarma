<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\WebRtc;

use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\GetIntegrationResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetIntegrationRequest extends ZadarmaRequest
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
        return '/v1/webrtc/';
    }

    protected function responseDataClass(): string
    {
        return GetIntegrationResponseData::class;
    }
}
