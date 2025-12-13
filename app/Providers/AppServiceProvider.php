<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('role', function ($roles) {
            if (!auth()->check()) {
                return false;
            }

            // roles: "admin" atau "admin,staff"
            $allowedRoles = array_map('trim', explode(',', $roles));

            return in_array(auth()->user()->role, $allowedRoles);
        });
    }
}
