<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\VehicleRepository;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Interfaces\RentalRepositoryInterface;
use App\Repositories\RentalRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, BaseRepository::class);
        $this->app->bind(VehicleRepositoryInterface::class, VehicleRepository::class);
        $this->app->bind(RentalRepositoryInterface::class, RentalRepository::class);
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
