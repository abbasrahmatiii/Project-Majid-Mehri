<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Contacts;

class ViewServiceProvider extends ServiceProvider
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
        // Share $settings and $contact with all views
        View::composer('*', function ($view) {
            $settings = Setting::first();
            $contact = Contacts::first();
            $view->with(compact('settings', 'contact'));
        });
    }
}
