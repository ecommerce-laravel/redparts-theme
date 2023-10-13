<?php

namespace Wjurry\RedParts\Providers;

use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RedPartsThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'redparts');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/redparts'),
            __DIR__.'/../public' => public_path('vendor/themes/redparts'),
        ]);
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });
    }

    /**
     * Get the route group configuration array.
     *
     * @return array{domain: string|null, as: string, prefix: string, middleware: string}
     */
    protected function routeConfiguration()
    {
        return [
            'domain' => env('APP_DOMAIN'),
            'as' => 'redparts.api.',
            'prefix' => 'redparts-api',
//            'middleware' => 'nova:api',
            'excluded_middleware' => [SubstituteBindings::class],
        ];
    }
}