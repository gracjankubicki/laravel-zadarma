<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\CreateExtensionResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateExtensionRequest extends ZadarmaRequest
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
        return '/v1/pbx/internal/create/';
    }

    protected function responseDataClass(): string
    {
        return CreateExtensionResponseData::class;
    }
}
