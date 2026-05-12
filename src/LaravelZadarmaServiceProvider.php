<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma;

use GracjanKubicki\LaravelZadarma\Http\Controllers\ZadarmaWebhookController;
use GracjanKubicki\LaravelZadarma\Saloon\ZadarmaConnector;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;
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

        if (! (bool) $this->app['config']->get('zadarma.webhooks.routes.enabled', false)) {
            return;
        }

        $path = $this->app['config']->get('zadarma.webhooks.routes.path', 'zadarma/webhook');
        $name = $this->app['config']->get('zadarma.webhooks.routes.name', 'zadarma.webhook');
        $middleware = $this->app['config']->get('zadarma.webhooks.routes.middleware', []);

        $route = Route::match(['GET', 'POST'], trim(is_string($path) ? $path : 'zadarma/webhook', '/'), ZadarmaWebhookController::class);

        if (is_string($name)) {
            $route->name($name);
        }

        if (is_string($middleware) || is_array($middleware)) {
            $route->middleware($middleware);
        }
    }
}
