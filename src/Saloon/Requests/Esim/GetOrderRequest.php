<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Esim;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Esim\GetOrderResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetOrderRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string|int $iccid,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/esim/order/'.rawurlencode((string) $this->iccid).'/';
    }

    protected function responseDataClass(): string
    {
        return GetOrderResponseData::class;
    }
}
