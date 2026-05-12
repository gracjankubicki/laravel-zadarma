<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxExtensions;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxExtensions\UpdateRecordingResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UpdateRecordingRequest extends ZadarmaRequest
{
    #[\Override]
    protected Method $method = Method::PUT;

    public function __construct(
        array $parameters = [],
    ) {
        parent::__construct(parameters: $parameters);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pbx/internal/recording/';
    }

    protected function responseDataClass(): string
    {
        return UpdateRecordingResponseData::class;
    }
}
