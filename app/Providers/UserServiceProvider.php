<?php
 
 namespace App\Providers;
 
 use Illuminate\Support\ServiceProvider;
 use App\Services\UserService;
 
 class UserServiceProvider extends ServiceProvider
 {
     /**
      * Register services.
      */
     public function register(): void
     {
         $this->app->singleton(UserService::class, function ($app) {
             $users = [
                 [
                     'id' => 1,
                     'name' => 'Shana Eve',
                     'gender' => 'Male',
                     'age' => '21'
                 ], 
                 [
                     'id' => 2,
                     'name' => 'Louise Margaret',
                     'gender' => 'Female',
                     'age' => '20'
                 ]                           
             ];
             return new UserService($users);
         });
     }
 
     /**
      * Bootstrap services.
      */
     public function boot(): void
     {
         //
     }
 }