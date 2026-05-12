<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Documents;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\UpdateGroupResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateGroupRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        public readonly string|int $groupid,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/documents/groups/update/'.rawurlencode((string) $this->groupid).'/';
    }

    protected function responseDataClass(): string
    {
        return UpdateGroupResponseData::class;
    }
}
