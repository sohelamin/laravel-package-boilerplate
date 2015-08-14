<?php

namespace MyVendor\MyPackage;

use Illuminate\Support\ServiceProvider;

class MyPackageServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        // Loading routes
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }

        // Publishing configs
        $this->publishes([
            __DIR__ . '/config/my-package.php' => config_path('my-package.php'),
        ]);

        // Publishing views
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views'),
        ]);

        // Loading translations
        $this->loadTranslationsFrom(__DIR__ . '/translations', 'my-package');

        // Publishing public assets
        $this->publishes([
            __DIR__ . '/assets' => public_path('my-vendor/my-package'),
        ], 'public');

        // Publishing migrations
        $this->publishes([
            __DIR__ . '/migrations' => database_path('/migrations'),
        ], 'migrations');

        // Publishing seeds
        $this->publishes([
            __DIR__ . '/seeds' => database_path('/seeds'),
        ], 'migrations');

    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MyPackageClass', 'MyVendor\MyPackage\MyPackageClass');
    }

}
