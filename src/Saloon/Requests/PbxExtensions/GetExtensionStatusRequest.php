<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\GetExtensionStatusResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetExtensionStatusRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string|int $pbxsip,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pbx/internal/'.rawurlencode((string) $this->pbxsip).'/status/';
    }

    protected function responseDataClass(): string
    {
        return GetExtensionStatusResponseData::class;
    }
}
