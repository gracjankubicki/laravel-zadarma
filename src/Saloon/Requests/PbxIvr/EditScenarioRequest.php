<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\EditScenarioResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class EditScenarioRequest extends ZadarmaRequest
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
        return '/v1/pbx/ivr/scenario/edit/';
    }

    protected function responseDataClass(): string
    {
        return EditScenarioResponseData::class;
    }
}
