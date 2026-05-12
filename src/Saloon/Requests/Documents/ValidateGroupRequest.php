<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Documents;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\ValidateGroupResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ValidateGroupRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string|int $id,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/documents/groups/valid/'.rawurlencode((string) $this->id).'/';
    }

    protected function responseDataClass(): string
    {
        return ValidateGroupResponseData::class;
    }
}
