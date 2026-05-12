<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma;

use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Saloon\Http\Request;
use Saloon\Http\Response;

final readonly class Zadarma
{
    public function __construct(
        private ZadarmaConnector $connector,
    ) {}

    public function connector(): ZadarmaConnector
    {
        return $this->connector;
    }

    public function send(Request $request): Response
    {
        return $this->connector->send($request);
    }
}
