<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\VirtualNumbers;

use GracjanKubicki\LaravelZadarma\Saloon\Data\VirtualNumbers\ListAvailableNumbersResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class ListAvailableNumbersRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string|int $directionId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/direct_numbers/available/'.rawurlencode((string) $this->directionId).'/';
    }

    protected function responseDataClass(): string
    {
        return ListAvailableNumbersResponseData::class;
    }
}
