<?php

namespace App\Providers;

use App\Repository\EloquentEmployeeRepository;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class EmployeeRepositoryProvider extends ServiceProvider
{
    /*public array $binding = [
        EloquentEmployeeRepository::class => EmployeeRepositoryInterface::class
    ];*/

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EloquentEmployeeRepository::class);
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
