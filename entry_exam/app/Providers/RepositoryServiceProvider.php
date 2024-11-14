<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\HotelRepository;
use App\Repositories\HotelRepositoryInterface;
use App\Repositories\BookingRepository;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\PrefectureRepository;
use App\Repositories\PrefectureRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $repositories = [
            HotelRepositoryInterface::class => HotelRepository::class,
            PrefectureRepositoryInterface::class => PrefectureRepository::class,
            UserRepositoryInterface::class => UserRepository::class,
            BookingRepositoryInterface::class => BookingRepository::class,
        ];

        foreach ($repositories as $interface => $repository) {
            $this->app->singleton($interface, $repository);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
