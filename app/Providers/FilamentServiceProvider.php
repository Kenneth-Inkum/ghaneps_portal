<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use Phpsa\FilamentAuthentication\Resources\RoleResource;
use Phpsa\FilamentAuthentication\Resources\UserResource;
use Phpsa\FilamentAuthentication\Resources\PermissionResource;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            // Filament::registerViteTheme('resources/css/filament.css');

            if(auth()->user()){
                if (auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Manage Users')
                            ->url(UserResource::getUrl())
                            ->icon('heroicon-o-user'),
                        UserMenuItem::make()
                            ->label('Manage Roles')
                            ->url(RoleResource::getUrl())
                            ->icon('heroicon-o-user-group'),
                        UserMenuItem::make()
                            ->label('Manage Permissions')
                            ->url(PermissionResource::getUrl())
                            ->icon('heroicon-o-lock-closed'),
                    ]);
                }
            }
        });
    }
}
