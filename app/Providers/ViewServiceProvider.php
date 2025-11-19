<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('components.sidebar', function ($view) {
            $user = auth()->user();
            $role = $user->role ?? null;

            $menus = config("menu.$role") ?? [];

            $view->with('menus', $menus);
        });
    }
}
