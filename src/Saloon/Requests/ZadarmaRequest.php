<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasFormBody;

abstract class ZadarmaRequest extends Request implements HasBody
{
    use HasFormBody;

    #[\Override]
    protected Method $method;

    /**
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(
        protected array $parameters = [],
    ) {}

    /**
     * @return class-string<ZadarmaResponseData>
     */
    abstract protected function responseDataClass(): string;

    public function createDtoFromResponse(Response $response): ZadarmaResponseData
    {
        return $this->responseDataClass()::fromResponse($response);
    }

    public function signatureEndpoint(): string
    {
        return $this->resolveEndpoint();
    }

    /**
     * @return array<string, mixed>
     */
    public function signatureParameters(): array
    {
        return $this->parametersWithFormat();
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        if ($this->method !== Method::GET) {
            return [];
        }

        return $this->parametersWithFormat();
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        if ($this->method === Method::GET) {
            return [];
        }

        return $this->parametersWithFormat();
    }

    /**
     * @return array<string, mixed>
     */
    protected function parametersWithFormat(): array
    {
        return ['format' => 'json'] + $this->parameters;
    }
}
