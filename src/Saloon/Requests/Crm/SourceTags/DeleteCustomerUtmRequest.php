<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\SourceTags;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags\DeleteCustomerUtmResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class DeleteCustomerUtmRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::DELETE;

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
        return DeleteCustomerUtmResponseData::class;
    }
}
