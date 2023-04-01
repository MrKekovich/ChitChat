<?php

namespace App\Providers;

use App\Service\Chat\Repository\ChatRepository;
use App\Service\Chat\Repository\EloquentChatRepository;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\Presets\Bootstrap;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ChatRepository::class, EloquentChatRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
