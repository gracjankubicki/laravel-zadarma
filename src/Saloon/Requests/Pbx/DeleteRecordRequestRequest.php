<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Pbx;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Pbx\DeleteRecordRequestResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class DeleteRecordRequestRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::DELETE;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pbx/record/request/';
    }

    protected function responseDataClass(): string
    {
        return DeleteRecordRequestResponseData::class;
    }
}
