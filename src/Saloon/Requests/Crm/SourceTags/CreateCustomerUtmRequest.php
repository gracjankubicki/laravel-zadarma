<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\SourceTags;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\SourceTags\CreateCustomerUtmResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateCustomerUtmRequest extends ZadarmaRequest
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
        return '/customers/utms';
    }

    protected function responseDataClass(): string
    {
        return CreateCustomerUtmResponseData::class;
    }
}
