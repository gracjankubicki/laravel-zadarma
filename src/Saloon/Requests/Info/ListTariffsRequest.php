<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Info;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Info\ListTariffsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListTariffsRequest extends ZadarmaRequest
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
        return '/v1/info/lists/tariffs/';
    }

    protected function responseDataClass(): string
    {
        return ListTariffsResponseData::class;
    }
}
