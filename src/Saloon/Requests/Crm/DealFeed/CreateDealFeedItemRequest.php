<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\DealFeed;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\DealFeed\CreateDealFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateDealFeedItemRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::POST;

    public function __construct(
        public readonly string|int $dealId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/deals/'.rawurlencode((string) $this->dealId).'/feed';
    }

    protected function responseDataClass(): string
    {
        return CreateDealFeedItemResponseData::class;
    }
}
