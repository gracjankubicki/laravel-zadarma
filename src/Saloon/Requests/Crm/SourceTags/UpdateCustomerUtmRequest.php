<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\SourceTags;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags\UpdateCustomerUtmResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateCustomerUtmRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string|int $utmId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/customers/utms/'.rawurlencode((string) $this->utmId).'';
    }

    protected function responseDataClass(): string
    {
        return UpdateCustomerUtmResponseData::class;
    }
}
