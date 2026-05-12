<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Esim;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Esim\ListDevicesResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListDevicesRequest extends ZadarmaRequest
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
        return '/v1/esim/devices/';
    }

    protected function responseDataClass(): string
    {
        return ListDevicesResponseData::class;
    }
}
