<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\DeleteScenarioResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class DeleteScenarioRequest extends ZadarmaRequest
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
        return '/v1/pbx/ivr/scenario/delete/';
    }

    protected function responseDataClass(): string
    {
        return DeleteScenarioResponseData::class;
    }
}
