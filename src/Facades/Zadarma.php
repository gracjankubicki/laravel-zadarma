<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Facades;

use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Illuminate\Support\Facades\Facade;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * @method static ZadarmaConnector connector()
 * @method static Response send(Request $request)
 */
final class Zadarma extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'zadarma';
    }
}
