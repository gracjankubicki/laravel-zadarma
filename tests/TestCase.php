<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Tests;

use GracjanKubicki\LaravelZadarma\LaravelZadarmaServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param  Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelZadarmaServiceProvider::class,
        ];
    }

    /**
     * @param  Application  $app
     */
    protected function defineEnvironment($app): void
    {
        $app['config']->set('zadarma.key', 'test-key');
        $app['config']->set('zadarma.secret', 'test-secret');
        $app['config']->set('zadarma.base_url', 'https://api.example.test');
    }
}
