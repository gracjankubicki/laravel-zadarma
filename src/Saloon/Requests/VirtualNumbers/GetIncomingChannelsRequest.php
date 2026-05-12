<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\GetIncomingChannelsResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetIncomingChannelsRequest extends ZadarmaRequest
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
        return '/v1/direct_numbers/incoming_channels/';
    }

    protected function responseDataClass(): string
    {
        return GetIncomingChannelsResponseData::class;
    }
}
