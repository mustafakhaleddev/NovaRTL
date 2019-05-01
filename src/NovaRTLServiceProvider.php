<?php

namespace MK\NovaRTL;

use Illuminate\Support\Facades\App;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class NovaRTLServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $locale = App::getLocale();
        $rtlLocales = config('app.novaRTL', ['ar']);
        if (in_array($locale, $rtlLocales)) {
            Nova::serving(function (ServingNova $event) {
                Nova::style('nova-volve-rtl', __DIR__ . '/../resources/css/theme.css');
            });
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
