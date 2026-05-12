<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\SetCallInfoNotificationsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class SetCallInfoNotificationsRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::POST;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pbx/callinfo/notifications/';
    }

    protected function responseDataClass(): string
    {
        return SetCallInfoNotificationsResponseData::class;
    }
}
