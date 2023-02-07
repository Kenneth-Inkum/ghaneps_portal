<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // reset cached roles and permissions
                app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

                // MISC
                // $miscPermission = Permission::create(['name' => 'N/A']);

                //USER MODEL
                $userPermissionCreate = Permission::create(['name' => 'create: user']);
                $userPermissionRead = Permission::create(['name' => 'read: user']);
                $userPermissionUpdate = Permission::create(['name' => 'update: user']);
                $userPermissionDelete = Permission::create(['name' => 'delete: user']);

                //ROLE MODEL
                $rolePermissionCreate = Permission::create(['name' => 'create: role']);
                $rolePermissionRead = Permission::create(['name' => 'read: role']);
                $rolePermissionUpdate = Permission::create(['name' => 'update: role']);
                $rolePermissionDelete = Permission::create(['name' => 'delete: role']);

                //PERMISSION MODEL
                $permissionCreate = Permission::create(['name' => 'create: permission']);
                $permissionRead = Permission::create(['name' => 'read: permission']);
                $permissionUpdate = Permission::create(['name' => 'update: permission']);
                $permissionDelete = Permission::create(['name' => 'delete: permission']);

                // ENTITY MODEL
                $entityPermissionCreate = Permission::create(['name' => 'create: entity']);
                $entityPermissionRead = Permission::create(['name' => 'read: entity']);
                $entityPermissionUpdate = Permission::create(['name' => 'update: entity']);
                $entityPermissionDelete = Permission::create(['name' => 'delete: entity']);

                // PARTICIPANT MODEL
                $participantPermissionCreate = Permission::create(['name' => 'create: participant']);
                $participantPermissionRead = Permission::create(['name' => 'read: participant']);
                $participantPermissionUpdate = Permission::create(['name' => 'update: participant']);
                $participantPermissionDelete = Permission::create(['name' => 'delete: participant']);

                // EVENT MODEL
                $eventPermissionCreate = Permission::create(['name' => 'create: event']);
                $eventPermissionRead = Permission::create(['name' => 'read: event']);
                $eventPermissionUpdate = Permission::create(['name' => 'update: event']);
                $eventPermissionDelete = Permission::create(['name' => 'delete: event']);

                //ADMINS
                $adminPermissionRead = Permission::create(['name' => 'read: admin']);
                $adminPermissionUpdate = Permission::create(['name' => 'update: admin']);


                //CREATE ROLES
                $userRole = Role::create(['name' => 'user'])->syncPermissions([
                    $entityPermissionCreate,
                    $entityPermissionRead,
                    $entityPermissionUpdate,

                    $participantPermissionCreate,
                    $participantPermissionRead,
                    $participantPermissionUpdate,
                ]);

                $moderatorRole = Role::create(['name' => 'moderator'])->syncPermissions([
                    $entityPermissionCreate,
                    $entityPermissionRead,
                    $entityPermissionUpdate,
                    $entityPermissionDelete,

                    $participantPermissionCreate,
                    $participantPermissionRead,
                    $participantPermissionUpdate,
                    $participantPermissionDelete,

                    $userPermissionCreate,
                    $userPermissionRead,
                    $userPermissionUpdate,

                    $eventPermissionRead,
                ]);

                $managerRole = Role::create(['name' => 'manager'])->syncPermissions([
                    $entityPermissionCreate,
                    $entityPermissionRead,
                    $entityPermissionUpdate,
                    $entityPermissionDelete,

                    $participantPermissionCreate,
                    $participantPermissionRead,
                    $participantPermissionUpdate,
                    $participantPermissionDelete,

                    $userPermissionCreate,
                    $userPermissionRead,
                    $userPermissionUpdate,
                    $userPermissionDelete,

                    $eventPermissionCreate,
                    $eventPermissionRead,
                    $eventPermissionUpdate,
                    $eventPermissionDelete,
                ]);

                $coordinatorRole = Role::create(['name' => 'coordinator'])->syncPermissions([
                    $entityPermissionRead,

                    $participantPermissionRead,

                    $userPermissionRead,

                    $eventPermissionRead,
                ]);

                $secretaryRole = Role::create(['name' => 'secretary'])->syncPermissions([
                    $entityPermissionRead,

                    $participantPermissionRead,

                    $userPermissionRead,

                    $eventPermissionRead,
                    $eventPermissionUpdate,
                ]);

                $facilitatorRole = Role::create(['name' => 'facilitator'])->syncPermissions([
                    $entityPermissionRead,

                    $participantPermissionRead,

                    $userPermissionRead,

                    $eventPermissionRead,
                ]);

                $accountantRole = Role::create(['name' => 'accountant'])->syncPermissions([
                    $entityPermissionRead,

                    $participantPermissionRead,

                    $userPermissionRead,

                    $eventPermissionRead,
                ]);

                $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
                    $userPermissionCreate,
                    $userPermissionRead,
                    $userPermissionUpdate,
                    $userPermissionDelete,

                    $rolePermissionCreate,
                    $rolePermissionRead,
                    $rolePermissionUpdate,
                    $rolePermissionDelete,

                    $permissionCreate,
                    $permissionRead,
                    $permissionUpdate,
                    $permissionDelete,

                    $adminPermissionRead,
                    $adminPermissionUpdate,

                    $entityPermissionCreate,
                    $entityPermissionRead,
                    $entityPermissionUpdate,
                    $entityPermissionDelete,

                    $participantPermissionCreate,
                    $participantPermissionRead,
                    $participantPermissionUpdate,
                    $participantPermissionDelete,

                    $eventPermissionCreate,
                    $eventPermissionRead,
                    $eventPermissionUpdate,
                    $eventPermissionDelete,
                ]);

                $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
                    $userPermissionCreate,
                    $userPermissionRead,
                    $userPermissionUpdate,
                    $userPermissionDelete,

                    $rolePermissionCreate,
                    $rolePermissionRead,
                    $rolePermissionUpdate,
                    $rolePermissionDelete,

                    $permissionCreate,
                    $permissionRead,
                    $permissionUpdate,
                    $permissionDelete,

                    $adminPermissionRead,
                    $adminPermissionUpdate,

                    $entityPermissionCreate,
                    $entityPermissionRead,
                    $entityPermissionUpdate,
                    $entityPermissionDelete,

                    $participantPermissionCreate,
                    $participantPermissionRead,
                    $participantPermissionUpdate,
                    $participantPermissionDelete,

                    $eventPermissionCreate,
                    $eventPermissionRead,
                    $eventPermissionUpdate,
                    $eventPermissionDelete,

                ]);

                $developerRole = Role::create(['name' => 'developer'])->syncPermissions([
                    $adminPermissionRead,
                ]);

                User::create([
                    'name' => 'super-admin',
                    'is_admin' => true,
                    'email' => 'super-admin@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@superadmin'),
                    'remember_token' => Str::random(60),
                ])->assignRole($superAdminRole);

                User::create([
                    'name' => 'admin',
                    'is_admin' => true,
                    'email' => 'admin@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@admin'),
                    'remember_token' => Str::random(60),
                ])->assignRole($adminRole);

                User::create([
                    'name' => 'moderator',
                    'is_admin' => true,
                    'email' => 'moderator@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@moderator'),
                    'remember_token' => Str::random(60),
                ])->assignRole($moderatorRole);

                User::create([
                    'name' => 'manager',
                    'is_admin' => true,
                    'email' => 'manager@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@manager'),
                    'remember_token' => Str::random(60),
                ])->assignRole($managerRole);

                User::create([
                    'name' => 'coordinator',
                    'is_admin' => true,
                    'email' => 'coordinator@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@coordinator'),
                    'remember_token' => Str::random(60),
                ])->assignRole($coordinatorRole);

                User::create([
                    'name' => 'secretary',
                    'is_admin' => true,
                    'email' => 'secretary@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@secretary'),
                    'remember_token' => Str::random(60),
                ])->assignRole($secretaryRole);

                User::create([
                    'name' => 'facilitator',
                    'is_admin' => true,
                    'email' => 'facilitator@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@facilitator'),
                    'remember_token' => Str::random(60),
                ])->assignRole($facilitatorRole);

                User::create([
                    'name' => 'accountant',
                    'is_admin' => true,
                    'email' => 'accountant@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@accountant'),
                    'remember_token' => Str::random(60),
                ])->assignRole($accountantRole);

                User::create([
                    'name' => 'developer',
                    'is_admin' => true,
                    'email' => 'developer@ghaneps.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('Ghaneps@developer'),
                    'remember_token' => Str::random(60),
                ])->assignRole($developerRole);

                for ($i = 1; $i < 2; $i++) {
                    User::create([
                        'name' => 'Sample App User ' . $i,
                        'is_admin' => false,
                        'email' => 'sampleappuser' . $i . '@ghaneps.com',
                        'email_verified_at' => now(),
                        'password' => bcrypt('test@test'),
                        'remember_token' => Str::random(60),
                    ])->assignRole($userRole);
                }
    }
}
