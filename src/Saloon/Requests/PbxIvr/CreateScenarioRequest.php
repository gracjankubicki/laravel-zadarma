<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\CreateScenarioResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateScenarioRequest extends ZadarmaRequest
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
        return '/v1/pbx/ivr/scenario/create/';
    }

    protected function responseDataClass(): string
    {
        return CreateScenarioResponseData::class;
    }
}
