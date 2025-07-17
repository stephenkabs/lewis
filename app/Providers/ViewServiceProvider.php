<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Setting;
use App\Models\Menu;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fetch settings and share with all views
        View::composer('*', function ($view) {
            $displaySettings = Setting::all();
            $view->with('displaySettings', $displaySettings);
        });

                        View::composer('*', function ($view) {
            $generalSettings = Setting::all();
            $view->with('generalSettings', $generalSettings);
        });



     View::composer('*', function ($view) {
        $menus = Menu::whereNull('parent_id')->with('children.children')->orderBy('order')->get();
        $view->with('menus', $menus);
    });


        View::composer('*', function ($view) {
            $myuser = User::find(1); // Fetch a specific user by ID
            $view->with('myuser', $myuser);
        });
    }
}
