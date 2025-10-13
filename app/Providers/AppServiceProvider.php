<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CourseVideo;
use App\Observers\CourseVideoObserver;
use App\Models\User;
use App\Models\UserProfile;
use App\Observers\UserObserver;
use App\Observers\UserProfileObserver;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        CourseVideo::observe(CourseVideoObserver::class);
        User::observe(UserObserver::class);
        UserProfile::observe(UserProfileObserver::class);
        Paginator::useBootstrap();

    }
}
