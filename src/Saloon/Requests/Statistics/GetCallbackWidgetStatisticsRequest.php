<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Statistics;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Statistics\GetCallbackWidgetStatisticsResponseData;
use Saloon\Enums\Method;

final class GetCallbackWidgetStatisticsRequest extends ZadarmaStatisticsRequest
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
        return '/v1/statistics/callback_widget/';
    }

    protected function responseDataClass(): string
    {
        return GetCallbackWidgetStatisticsResponseData::class;
    }
}
