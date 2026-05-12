<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\CreateIvrResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateIvrRequest extends ZadarmaRequest
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
        return '/v1/pbx/ivr/create/';
    }

    protected function responseDataClass(): string
    {
        return CreateIvrResponseData::class;
    }
}
