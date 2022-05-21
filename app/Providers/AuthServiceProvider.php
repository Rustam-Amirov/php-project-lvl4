<?php

namespace App\Providers;

use App\Policies\TaskPolicy;
use App\Policies\TaskStatusPolice;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Task;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Task' => 'App\Policies\TaskPolicy',
        'App\Models\TaskStatus' => 'App\Policies\TaskStatusPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
