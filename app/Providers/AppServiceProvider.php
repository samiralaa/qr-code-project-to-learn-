<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
