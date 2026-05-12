<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\UpdateExtensionPasswordResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateExtensionPasswordRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string|int $sip,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pbx/internal/'.rawurlencode((string) $this->sip).'/password/';
    }

    protected function responseDataClass(): string
    {
        return UpdateExtensionPasswordResponseData::class;
    }
}
