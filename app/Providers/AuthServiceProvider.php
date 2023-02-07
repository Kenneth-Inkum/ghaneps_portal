<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\Entity;
use App\Models\Participant;
use App\Policies\RolePolicy;
use App\Policies\TeamPolicy;
use App\Policies\UserPolicy;
use App\Policies\EventPolicy;
use App\Policies\EntityPolicy;
use Buildix\Timex\Models\Event;
use App\Policies\PermissionPolicy;
use Spatie\Permission\Models\Role;
use App\Policies\ParticipantPolicy;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Role::class       => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        Event::class => EventPolicy::class,
        User::class => UserPolicy::class,
        Entity::class => EntityPolicy::class,
        Participant::class => ParticipantPolicy::class,
        // CustomPage::class => CustomPagePolicy::class,
        // SettingsPage::class => SettingsPagePolicy::class
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
