<?php

namespace App\Providers;

use App\Models\About;
use App\Models\mainmenu;
use App\Models\submenu;
use App\Models\Team;
use App\Models\TeamCategory;
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
        
        $mainmenu = mainmenu::with('submenu')->get();
        // dd($submenu);
        Schema::defaultStringLength(191);
        view()->composer('*', function($view) use($mainmenu) {
            $view->with(['mainmenu'=>$mainmenu]);
        });
    }
}
