<?php

namespace Wjurry\RedParts\Providers;

use App\Services\CurrenciesService;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RedPartsThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();

        // Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'redparts');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/redparts'),
        ]);

        // Publish assets
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/themes/redparts'),
        ], 'public');

        // Publish config
        $this->publishes([
            __DIR__.'/../config' => config_path()
        ], 'config');
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
        $appDomain = Arr::get(parse_url(env('APP_URL')), 'host');

        return [
            'domain' => env('THEME_REDPARTS_API_DOMAIN', $appDomain),
            'as' => 'redparts.api.',
            'prefix' => 'redparts-api',
//            'middleware' => 'nova:api',
            'excluded_middleware' => [SubstituteBindings::class],
        ];
    }

    public function register()
    {
        // Register currency directive and helper
        Blade::directive('redpartsSelectedCurrency', function () {
            return "<?php echo app('renderCurrencyName')(app()->getLocale()); ?>";
        });

        $this->app->singleton('renderCurrencyName', function (Application $app) {
            return [[CurrenciesService::class, 'getSelectedCurrency'], $app->getLocale()];
        });


        // Register locale directive and helper
        Blade::directive('redpartsSelectedLanguage', function () {
            return "<?php echo app('renderLangName')(app()->getLocale()); ?>";
        });

        $this->app->singleton('renderLangName', function ($app) {
            return function ($locale) {
                return Arr::get(config("app.locales_settings.$locale.names"), $locale, '');
            };
        });
    }
}