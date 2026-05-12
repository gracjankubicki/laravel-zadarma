<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\ListSoundsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListSoundsRequest extends ZadarmaRequest
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
        return '/v1/pbx/ivr/sounds/list';
    }

    protected function responseDataClass(): string
    {
        return ListSoundsResponseData::class;
    }
}
