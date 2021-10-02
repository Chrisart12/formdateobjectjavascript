<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()  
    {
        $this->app->bind('App\Repositories\PostInterface', 'App\Repositories\PostRepository');
        $this->app->bind('App\Repositories\CommentInterface', 'App\Repositories\CommentRepository');
        $this->app->bind('App\Repositories\ImageInterface', 'App\Repositories\ImageRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
