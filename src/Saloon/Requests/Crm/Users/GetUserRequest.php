<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Users;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users\GetUserResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetUserRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string|int $userId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/users/'.rawurlencode((string) $this->userId).'';
    }

    protected function responseDataClass(): string
    {
        return GetUserResponseData::class;
    }
}
