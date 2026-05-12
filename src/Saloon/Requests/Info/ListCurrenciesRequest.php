<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\ListCurrenciesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListCurrenciesRequest extends ZadarmaRequest
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
        return '/v1/info/lists/currencies/';
    }

    protected function responseDataClass(): string
    {
        return ListCurrenciesResponseData::class;
    }
}
