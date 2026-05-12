<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests\Documents;

use GracjanKubicki\LaravelZadarma\Saloon\Data\Documents\UploadDocumentResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use Saloon\Enums\Method;

final class UploadDocumentRequest extends ZadarmaRequest
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
        return '/v1/documents/upload/';
    }

    protected function responseDataClass(): string
    {
        return UploadDocumentResponseData::class;
    }
}
