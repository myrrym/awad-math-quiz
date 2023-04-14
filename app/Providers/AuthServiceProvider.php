<?php

namespace App\Providers;

// attempt 1
use Illuminate\Support\Facades\Gate;
// attempt 2
use App\Policies\LeaderboardPolicy;
use App\Models\Leaderboard;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    // protected $policies = [
    //     // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    // ];

    // attempt
    protected $policies = [
        Leaderboard::class => LeaderboardPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // only logged in users can view leaderboard
        // attempt 1
        Gate::define('view-leaderboard', function () {
            return Auth::check();
        });

        // attempt 2
        /* Gate::define('view-leaderboard', [LeaderboardPolicy::class, 'view']); */
    }
}
