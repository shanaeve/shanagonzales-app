<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function ($app) {
            $users = [
                [
                    'id' => 1
                    'name' => 'Margo',
                    'gender' => 'Male'
                ],
                [
                    'id' => 2
                    'name' => 'Shana Eve',
                    'gender' => 'Female'
                ],
                [
                    'id' => 3
                    'name' => 'Louise',
                    'gender' => 'Female'
                ]
            ];
            return new UserService($users);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}