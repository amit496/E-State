<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Enum\Status\StatusEnum;
use App\Enum\Roles\RolesEnum;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'manage users',
            'manage roles',
            'manage properties',
            'view dashboard',
            'create listings',
            'edit listings',
            'delete listings',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        
        $roles = [
            'Super Admin' => Permission::pluck('name')->toArray(),
            'Admin' => ['manage users', 'manage properties', 'view dashboard'],
            'Sub Admin' => ['create listings', 'edit listings', 'view dashboard'],
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissions);
        }

        // === Define and create users ===
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => 'password',
                'role_enum' => RolesEnum::SUPERADMIN,
                'spatie_role' => 'Super Admin',
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => 'password',
                'role_enum' => RolesEnum::ADMIN,
                'spatie_role' => 'Admin',
            ],
            [
                'name' => 'Sub Admin',
                'email' => 'subadmin@example.com',
                'password' => 'password',
                'role_enum' => RolesEnum::SUBADMIN,
                'spatie_role' => 'Sub Admin',
            ],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make($data['password']),
                    'status' => StatusEnum::ACTIVE,
                    'role' => $data['role_enum'],
                ]
            );

            $user->syncRoles([$data['spatie_role']]);
        }
    }
}
