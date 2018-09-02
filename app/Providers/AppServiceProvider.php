<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Setting;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Schema::defaultStringLength(191);
		view()->composer('layouts.app', function($view) {;
			
			$view->with('settings', Setting::first());

		});		
		
		view()->composer('welcome_header', function($view) {;
			
			$view->with('settings', Setting::first());

		});
		
		view()->composer('welcome_header', function($view) {
			
			$view->with('now', Carbon::now());

		});
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
