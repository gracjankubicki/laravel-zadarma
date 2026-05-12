<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Labels;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Labels\CreateCustomerLabelResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class CreateCustomerLabelRequest extends ZadarmaRequest
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
        return '/customers/labels';
    }

    protected function responseDataClass(): string
    {
        return CreateCustomerLabelResponseData::class;
    }
}
