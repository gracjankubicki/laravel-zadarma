<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Labels;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Labels\DeleteCustomerLabelResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class DeleteCustomerLabelRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::DELETE;

    public function __construct(
        public readonly string|int $lId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/customers/labels/'.rawurlencode((string) $this->lId).'';
    }

    protected function responseDataClass(): string
    {
        return DeleteCustomerLabelResponseData::class;
    }
}
