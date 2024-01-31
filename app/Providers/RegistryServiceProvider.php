<?php

namespace App\Providers;

use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceImpl;
use App\Services\Feedback\FeedbackService;
use App\Services\Feedback\FeedbackServiceImpl;
use Illuminate\Support\ServiceProvider;

/**
 * Class RegistryServiceProvider
 *
 * @package App\Providers
 */
class RegistryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AuthService::class, AuthServiceImpl::class);
        $this->app->singleton(FeedbackService::class, FeedbackServiceImpl::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
