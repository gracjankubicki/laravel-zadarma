<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\ClientTimeline;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\ClientTimeline\CreateCustomerFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateCustomerFeedItemRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::POST;

    public function __construct(
        public readonly string|int $cId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/customers/'.rawurlencode((string) $this->cId).'/feed';
    }

    protected function responseDataClass(): string
    {
        return CreateCustomerFeedItemResponseData::class;
    }
}
