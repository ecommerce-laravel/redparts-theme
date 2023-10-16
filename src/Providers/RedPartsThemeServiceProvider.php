<?php

namespace Wjurry\RedParts\Providers;

use App\Services\CurrenciesService;
use App\Services\ThemesService;
use App\Utilities\Nova;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Wjurry\RedParts\Nova\Resources\RedpartsThemeSettings;

class RedPartsThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Register theme routes
        $this->registerRoutes();

        // Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'redparts');

        // Register lang
        $this->loadJsonTranslationsFrom(__DIR__.'/../lang');

        // Publish theme components
        $this->publishViews();
        $this->publishAssets();
        $this->publishConfig();
        $this->publishTranslations();

        // Register theme Nova's components
        $this->registerNovaMenu();
        $this->registerNovaResource();
    }

    public function publishViews()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/redparts'),
        ]);
    }

    public function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/themes/redparts'),
        ], 'public');
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config' => config_path()
        ], 'config');
    }

    public function publishTranslations()
    {
        $this->publishes([
            __DIR__.'/../lang/' => lang_path('vendor/themes/redparts')
        ], 'lang');
    }

    public function registerNovaMenu()
    {
        if (Str::lower(Arr::get(ThemesService::getActive(), 'name', '')) !== 'redparts') {
            return;
        }

        Nova::injectMenu(function (Request $request, Menu $menu) {
            $menu->append([
                MenuSection::make('RedParts Theme', [
                    MenuItem::make('Theme Settings', '/resources/redparts-theme-settings'),
                    MenuItem::make('Slider Settings', '/resources/redparts-theme-slider')
                ])->icon('color-swatch')
            ]);
        });
    }

    public function registerNovaResource()
    {
        if (Str::lower(Arr::get(ThemesService::getActive(), 'name', '')) !== 'redparts') {
            return;
        }

        Nova::resources([
            RedpartsThemeSettings::class
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
            return "<?php echo app('renderCurrencyName')(); ?>";
        });

        $this->app->singleton('renderCurrencyName', function (Application $app) {
            return function () use ($app) {
                return Arr::get(CurrenciesService::getSelectedCurrency($app->getLocale()), sprintf('name.%s', $app->getLocale()));
            };
        });


        // Register locale directive and helper
        Blade::directive('redpartsSelectedLanguage', function () {
            return "<?php echo app('renderLangName')(); ?>";
        });

        $this->app->singleton('renderLangName', function (Application $app) {
            return function () use ($app) {
                $locale = $app->getLocale();
                return Arr::get(config("app.locales_settings.$locale.names"), $locale, '');
            };
        });
    }
}