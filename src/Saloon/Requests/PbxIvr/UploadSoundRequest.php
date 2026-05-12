<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\PbxIvr;

use GracjanKubicki\LaravelZadarma\Saloon\Data\PbxIvr\UploadSoundResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UploadSoundRequest extends ZadarmaRequest
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
        return '/v1/pbx/ivr/sounds/upload';
    }

    protected function responseDataClass(): string
    {
        return UploadSoundResponseData::class;
    }
}
