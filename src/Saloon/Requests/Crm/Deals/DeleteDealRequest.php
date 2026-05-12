<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Deals;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Deals\DeleteDealResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class DeleteDealRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::DELETE;

    public function __construct(
        public readonly string|int $dealId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/deals/'.rawurlencode((string) $this->dealId).'';
    }

    protected function responseDataClass(): string
    {
        return DeleteDealResponseData::class;
    }
}
