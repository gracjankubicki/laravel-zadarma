<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma;

use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

final class LaravelZadarmaServiceProvider extends ServiceProvider
{
    #[\Override]
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/zadarma.php', 'zadarma');

        $this->app->singleton(ZadarmaConnector::class, function (Application $app): ZadarmaConnector {
            $config = $app['config']->get('zadarma');

            return new ZadarmaConnector(
                key: (string) $config['key'],
                secret: (string) $config['secret'],
                baseUrl: (string) $config['base_url'],
            );
        });

        $this->app->singleton(Zadarma::class, fn (Application $app): Zadarma => new Zadarma(
            connector: $app->make(ZadarmaConnector::class),
        ));

        $this->app->alias(Zadarma::class, 'zadarma');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/zadarma.php' => $this->app->configPath('zadarma.php'),
        ], 'zadarma-config');
    }
}
