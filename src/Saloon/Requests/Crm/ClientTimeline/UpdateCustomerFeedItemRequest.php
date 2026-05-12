<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\ClientTimeline;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\ClientTimeline\UpdateCustomerFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateCustomerFeedItemRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string|int $cId,
        public readonly string|int $iId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/customers/'.rawurlencode((string) $this->cId).'/feed/'.rawurlencode((string) $this->iId).'';
    }

    protected function responseDataClass(): string
    {
        return UpdateCustomerFeedItemResponseData::class;
    }
}
