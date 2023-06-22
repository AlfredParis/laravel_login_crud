<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//(1)added after the {{$lists->links()}} in the manage client
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //(2)added after the use Illuminate\Pagination\Paginator;
        Paginator::useBootstrap();
    }
}