<?php

namespace totalWebConnections\simpleBlog;

use Illuminate\Support\ServiceProvider;

class simpleBlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {


        include __DIR__.'/routes.php';
        $this->loadViewsFrom(__DIR__.'/views', 'simpleBlog');


        $this->publishes([
            __DIR__.'/public' => public_path('totalWebConnections/simpleBlog'),
        ], 'public');

        // $this->publishes([
        //     __DIR__.'/config/config.php' => config_path('simpleBlog-config.php'),
        // ]);
        // $this->mergeConfigFrom(__DIR__.'/config/config.php', 'simpleBlog.auth');
        // $this->publishes([__DIR__.'/config/config.php'  => config_path('simpleBlog.auth')]);
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('simpleBlog.php'),
        ]);



        //load database stuff
        // $this->app['config']['auth'] =  \Config::get('simpleBlog');
        // var_dump($this->app['config']['auth']);die;


        // var_dump(config('simpleBlog.providers'));die;
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        //register our middleware we need for the package
        app('router')->aliasMiddleware('blogAuth', \totalWebConnections\simpleBlog\Middleware\blogAuth::class);
        app('router')->aliasMiddleware('blogSettings', \totalWebConnections\simpleBlog\Middleware\blogSettings::class);
       
        $this->app->make('totalWebConnections\simpleBlog\controllers\postController');
        
    }
}
