<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Requests;

use BackedEnum;
use DateTimeInterface;
use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Parameters\ZadarmaParameterValue;
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
        return ['format' => 'json'] + $this->normalizeParameters($this->parameters);
    }

    /**
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    private function normalizeParameters(array $parameters): array
    {
        $normalized = [];

        foreach ($parameters as $key => $value) {
            $shouldExpand = $value instanceof ZadarmaParameterValue;
            $value = $this->normalizeParameterValue($value);

            if ($shouldExpand && is_array($value) && array_is_list($value) === false && $this->isParameterExpansion($value)) {
                foreach ($value as $expandedKey => $expandedValue) {
                    $normalized[$expandedKey] = $expandedValue;
                }

                continue;
            }

            $normalized[$key] = $value;
        }

        return $normalized;
    }

    private function normalizeParameterValue(mixed $value): mixed
    {
        if ($value instanceof ZadarmaParameterValue) {
            return $this->normalizeParameterValue($value->toZadarmaParameterValue());
        }

        if ($value instanceof BackedEnum) {
            return $value->value;
        }

        if ($value instanceof DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        }

        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_array($value)) {
            return array_map($this->normalizeParameterValue(...), $value);
        }

        return $value;
    }

    /**
     * @param  array<array-key, mixed>  $value
     */
    private function isParameterExpansion(array $value): bool
    {
        foreach (array_keys($value) as $key) {
            if (! is_string($key)) {
                return false;
            }
        }

        return $value !== [];
    }
}
