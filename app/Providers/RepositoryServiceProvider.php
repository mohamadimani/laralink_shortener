<?php

namespace App\Providers;

use App\Repositories\V1\Interfaces\ShortLinksRepositoryInterface;
use App\Repositories\V1\ShortLinksRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ShortLinksRepositoryInterface::class, ShortLinksRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
