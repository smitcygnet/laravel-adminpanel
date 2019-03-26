<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'generator');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'generator');
        $this->mergeConfigFrom(__DIR__ . '/../config/generator.php', 'generator');

        $this->publishes([
            __DIR__ . '/../config/generator.php' => config_path('generator.php'),
        ], 'generator');
        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor/generator'),
        ], 'generator_views');

        // Load the Breadcrumbs for the package
        if (class_exists('Breadcrumbs')) {
            require __DIR__ . '/../breadcrumbs.php';
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()   {

       //include base_path('library/modulecreator/generator/src/routes.php');
       //require_once('library/modulecreator/generator/src/helpers.php');

        // include __DIR__.'/../routes.php';
        // require_once(__DIR__.'/../helpers.php');

        /* $this->app->make('Library\Modulecreator\Generator\Src\Module');
        $this->app->make('Library\Modulecreator\Generator\Src\Controllers\Generator');
        $this->app->make('Library\Modulecreator\Generator\Src\Controllers\ModuleController');
        $this->app->make('Library\Modulecreator\Generator\Src\Repositories\ModuleRepository');
        $this->app->make('Library\Modulecreator\Generator\Src\Controllers\ModuleTableController');*/
    }
}
