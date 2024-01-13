<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // view()->composer('components.layouts.app', function ($view) {
        //     $view->with(['hi' => 'there']);
        // });

        Gate::define('admin', fn (User $user) => $user->admin);
        Blade::if('admin', fn () => request()->user()?->can('admin'));
    }
}
