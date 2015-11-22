<?php

namespace Roseffendi\Notes;

use Illuminate\Support\ServiceProvider;

class NotesServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'Roseffendi\Notes';

    /**
     * Booting package
     * @return void
     */
    public function boot()
    {
        $this->registerView();
        $this->registerTranslation();
        $this->registerRoute();
        $this->registerConfig();

        $navigator = $this->app['Increative\Pluginable\Contracts\Navigator'];

        $navigator->register(require __DIR__.'/Http/navigation.php');
    }

    /**
     * Register new service provider
     * @return void
     */
    public function register()
    {
        $this->app->bind('Roseffendi\Notes\Repositories\NotnotTokenRepository',
            'Roseffendi\Notes\Infrastructure\Repositories\NotnotTokenRepository');
    }

    /**
     * Registering config
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/notes.php', 'notes'
        );

        $this->publishes([
            __DIR__.'/../config/notes.php' => config_path('notes.php'),
        ], 'config');
    }

    /**
     * Registering views
     * @return void
     */
    protected function registerView()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'notes');

        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor/notes'),
        ], 'view');
    }

    /**
     * Registering route
     * @return void
     */
    protected function registerRoute()
    {
         if (! $this->app->routesAreCached()) {
            $this->app['router']->group(['namespace' => $this->namespace.'\Http\Controllers'], function($router){
                require __DIR__.'/Http/routes.php';
            });
        }
    }

    /**
     * Register translation
     * @return void
     */
    protected function registerTranslation()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'notes');
    }
}