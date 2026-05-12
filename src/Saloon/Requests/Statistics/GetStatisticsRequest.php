<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Statistics;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Statistics\GetStatisticsResponseData;
use Saloon\Enums\Method;

final class GetStatisticsRequest extends ZadarmaStatisticsRequest
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
        return '/v1/statistics/';
    }

    protected function responseDataClass(): string
    {
        return GetStatisticsResponseData::class;
    }
}
