<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Deals;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals\ListDealsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListDealsRequest extends ZadarmaRequest
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
        return '/deals';
    }

    protected function responseDataClass(): string
    {
        return ListDealsResponseData::class;
    }
}
