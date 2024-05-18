<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\AddressRepositoryInterface;
use App\Repositories\IpAddressRepositoryInterface;
use App\Repositories\IpAddressRepository;
use App\Repositories\AddressRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(IpAddressRepositoryInterface::class, IpAddressRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
