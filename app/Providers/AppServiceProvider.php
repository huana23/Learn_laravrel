<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repository\Interfaces\UserRepositoryInterface' => 'App\Repository\UserRepository',

        'App\Services\Interfaces\UserCatalogueServiceInterface' => 'App\Services\UserCatalogueService',
        'App\Repository\Interfaces\UserCatalogueRepositoryInterface' => 'App\Repository\UserCatalogueRepository',



        'App\Repository\Interfaces\ProvinceRepositoryInterface' => 'App\Repository\ProvinceRepository',
        'App\Repository\Interfaces\DistrictRepositoryInterface' => 'App\Repository\DistrictRepository',



    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach($this->bindings as $key => $val) {
            $this->app->bind($key, $val);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
