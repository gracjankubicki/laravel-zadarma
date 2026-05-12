<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Crm\Files;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Files\GetFileResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class GetFileRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string|int $fileId,
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/files/'.rawurlencode((string) $this->fileId).'';
    }

    protected function responseDataClass(): string
    {
        return GetFileResponseData::class;
    }
}
