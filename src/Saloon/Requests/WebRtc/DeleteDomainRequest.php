<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\WebRtc;

use GracjanKubicki\LaravelZadarma\Saloon\Data\WebRtc\DeleteDomainResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class DeleteDomainRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::DELETE;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/webrtc/domain/';
    }

    protected function responseDataClass(): string
    {
        return DeleteDomainResponseData::class;
    }
}
