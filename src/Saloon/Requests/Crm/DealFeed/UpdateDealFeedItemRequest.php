<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\DealFeed;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\DealFeed\UpdateDealFeedItemResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateDealFeedItemRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string|int $dealId,
        public readonly string|int $iId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/deals/'.rawurlencode((string) $this->dealId).'/feed/'.rawurlencode((string) $this->iId).'';
    }

    protected function responseDataClass(): string
    {
        return UpdateDealFeedItemResponseData::class;
    }
}
