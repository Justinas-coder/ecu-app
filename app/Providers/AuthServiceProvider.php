<?php

namespace App\Providers;

use App\Enums\EnumTrait;
use App\Enums\UserStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    use EnumTrait;

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function ($user) {
            return $user->role === UserStatus::ADMIN->value;
        });
    }
}
