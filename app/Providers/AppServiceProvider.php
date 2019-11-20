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
        //dd(env('DB_DATABASE'));
        $logos = Content::where('section','logos')->first();
        $contacto= Content::where('section','contacto')->first();
        $logos = $logos ? json_decode($logos->text) : '';
        $contacto = $contacto ? json_decode($contacto->text) : '';
//        dd($contacto);
        view()->share('logos',$logos);
        view()->share('contacto',$contacto);
    }
}
