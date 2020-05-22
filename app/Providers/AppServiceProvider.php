<?php

namespace App\Providers;

use App\Interfaces\Posts\PostsRepositoryInterface;
use App\Interfaces\Posts\PostsServiceInterface;
use App\Interfaces\Users\UsersRepositoryInterface;
use App\Interfaces\Users\UsersServiceInterface;
use App\Repositories\Posts\PostsRepository;
use App\Repositories\Users\UsersRepository;
use App\Services\Posts\PostsService;
use App\Services\Users\UsersService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UsersServiceInterface::class,
            UsersService::class
        );

        $this->app->singleton(
            UsersRepositoryInterface::class,
            UsersRepository::class
        );

        $this->app->singleton(
            PostsServiceInterface::class,
            PostsService::class
        );

        $this->app->singleton(
            PostsRepositoryInterface::class,
            PostsRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.cards', 'card');
    }
}
