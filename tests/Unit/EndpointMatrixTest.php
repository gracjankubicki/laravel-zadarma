<?php

declare(strict_types=1);

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;
use GracjanKubicki\LaravelZadarma\Saloon\Requests\ZadarmaRequest;
use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

/**
 * @return array<int, array{0: string, 1: string, 2: string, 3: string, 4: string, 5: array<int, string>}>
 */
function zadarmaEndpointCases(): array
{
    return require __DIR__.'/../Fixtures/endpoints.php';
}

function zadarmaRequestClass(string $group, string $requestClass): string
{
    return 'GracjanKubicki\\LaravelZadarma\\Saloon\\Requests\\'.$group.'\\'.$requestClass;
}

function zadarmaDataClass(string $group, string $dataClass): string
{
    return 'GracjanKubicki\\LaravelZadarma\\Saloon\\Data\\'.$group.'\\'.$dataClass;
}

/**
 * @param  array<int, string>  $placeholders
 */
function zadarmaRequestInstance(string $class, array $placeholders): ZadarmaRequest
{
    $arguments = [];

    foreach ($placeholders as $placeholder) {
        $arguments[] = strtolower((string) $placeholder).'-value';
    }

    $arguments[] = ['alpha' => 'beta'];

    return new $class(...$arguments);
}

/**
 * @param  array<int, string>  $placeholders
 */
function zadarmaExpectedEndpoint(string $path, array $placeholders): string
{
    foreach ($placeholders as $placeholder) {
        $path = str_replace('<'.$placeholder.'>', rawurlencode(strtolower((string) $placeholder).'-value'), $path);
    }

    return $path;
}

it('has a request and DTO class for every documented endpoint', function (
    string $group,
    string $requestClass,
    string $dataClass,
    string $method,
    string $path,
    array $placeholders,
): void {
    $requestFqcn = zadarmaRequestClass($group, $requestClass);
    $dataFqcn = zadarmaDataClass($group, $dataClass);

    expect(class_exists($requestFqcn))->toBeTrue()
        ->and(class_exists($dataFqcn))->toBeTrue()
        ->and(is_subclass_of($requestFqcn, ZadarmaRequest::class))->toBeTrue()
        ->and(is_subclass_of($dataFqcn, ZadarmaResponseData::class))->toBeTrue();

    $request = zadarmaRequestInstance($requestFqcn, $placeholders);

    expect($request->getMethod())->toBe(Method::from($method))
        ->and($request->resolveEndpoint())->toBe(zadarmaExpectedEndpoint($path, $placeholders))
        ->and($request->signatureEndpoint())->toBe(zadarmaExpectedEndpoint($path, $placeholders))
        ->and($request->signatureParameters())->toBe(['format' => 'json', 'alpha' => 'beta']);
})->with('zadarma endpoints');

it('maps every documented endpoint response to its endpoint DTO class', function (
    string $group,
    string $requestClass,
    string $dataClass,
    string $method,
    string $path,
    array $placeholders,
): void {
    $requestFqcn = zadarmaRequestClass($group, $requestClass);
    $dataFqcn = zadarmaDataClass($group, $dataClass);
    $request = zadarmaRequestInstance($requestFqcn, $placeholders);
    $connector = new ZadarmaConnector('test-key', 'test-secret', 'https://api.example.test');
    $connector->withMockClient(new MockClient([
        MockResponse::make(['status' => 'success', 'endpoint' => $path]),
    ]));

    $dto = $connector->send($request)->dtoOrFail();

    expect($dto)
        ->toBeInstanceOf($dataFqcn)
        ->and($dto->payload)->toHaveKey('endpoint', $path);
})->with('zadarma endpoints');

dataset('zadarma endpoints', fn (): array => zadarmaEndpointCases());
