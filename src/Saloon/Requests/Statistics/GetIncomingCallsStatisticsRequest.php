<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Statistics;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Statistics\GetIncomingCallsStatisticsResponseData;
use Saloon\Enums\Method;

final class GetIncomingCallsStatisticsRequest extends ZadarmaStatisticsRequest
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
        return '/v1/statistics/incoming-calls/';
    }

    protected function responseDataClass(): string
    {
        return GetIncomingCallsStatisticsResponseData::class;
    }
}
