<?php

namespace App\Providers;

use App\Content;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $logos = Content::where('section','logos')->first();
        $logos = json_decode($logos->text);
//        dd($logos);
        view()->share('logos',$logos);
    }
}
