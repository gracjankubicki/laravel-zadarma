<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\GetCallInfoResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetCallInfoRequest extends ZadarmaRequest
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
        return '/v1/pbx/callinfo/';
    }

    protected function responseDataClass(): string
    {
        return GetCallInfoResponseData::class;
    }
}
