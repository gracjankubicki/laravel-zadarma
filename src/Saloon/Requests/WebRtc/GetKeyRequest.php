<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\WebRtc;

use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\GetKeyResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetKeyRequest extends ZadarmaRequest
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
        return '/v1/webrtc/get_key/';
    }

    protected function responseDataClass(): string
    {
        return GetKeyResponseData::class;
    }
}
