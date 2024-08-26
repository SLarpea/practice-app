<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            [
                "name" => "view dashboard",
                "module" => "Dashboard",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "view authors",
                "module" => "Author",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "add authors",
                "module" => "Author",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit authors",
                "module" => "Author",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "delete authors",
                "module" => "Author",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "view novels",
                "module" => "Novel",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "add novels",
                "module" => "Novel",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit all novels",
                "module" => "Novel",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit own novel",
                "module" => "Novel",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "delete novels",
                "module" => "Novel",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "delete own novel",
                "module" => "Novel",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "view users",
                "module" => "User",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "add users",
                "module" => "User",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit users",
                "module" => "User",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit self",
                "module" => "User",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "delete users",
                "module" => "User",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "delete self",
                "module" => "User",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "view roles",
                "module" => "Role",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "add roles",
                "module" => "Role",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit roles",
                "module" => "Role",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "delete roles",
                "module" => "Role",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "view permissions",
                "module" => "Permission",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "add permissions",
                "module" => "Permission",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit permissions",
                "module" => "Permission",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "delete permissions",
                "module" => "Permission",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "view user roles",
                "module" => "User Role",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit user roles",
                "module" => "User Role",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "view user permissions",
                "module" => "User Role",
                "guard_name" => "sanctum",
                "status" => 1
            ],
            [
                "name" => "edit user permissions",
                "module" => "User Role",
                "guard_name" => "sanctum",
                "status" => 1
            ],
        ];

        Permission::insert($permissions);
        $role1 = Role::create(['name' => 'Super Admin', 'guard_name' => 'sanctum', 'status' => 1]);

        $role2 = Role::create(['name' => 'Admin', 'guard_name' => 'sanctum', 'status' => 1]);
        $role2Permissions = [
            'view dashboard', 
            'view authors', 
            'add authors',
            'edit authors',
            'delete authors',
            'view novels',
            'delete novels',
            'view users',
            'add users',
            'edit users',
            'edit self',
            'delete self',
            'view user roles',
            'edit user roles',
            'view user permissions',
        ];
        $role2->syncPermissions($role2Permissions);

        $role3 = Role::create(['name' => 'Author', 'guard_name' => 'sanctum', 'status' => 1]);
        $role3Permissions = [
            'view dashboard',
            'view novels',
            'add novels',
            'edit own novel',
            'delete own novel',
            'edit self',
            'delete self'
        ];
        $role3->givePermissionTo($role3Permissions);

        $role4 = Role::create(['name' => 'Guest', 'guard_name' => 'sanctum', 'status' => 1]);
        $role4Permissions = ['view dashboard'];
        $role4->givePermissionTo($role4Permissions);

        $user1 = User::create([
            "name" => "Nold",
            "email" => "arnold.sulana@gmail.com",
            "password" => Hash::make('asdqwe123'),
        ]);
        $user1->assignRole($role1);

        $user2 = User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make('asdqwe123'),
        ]);
        $user2->assignRole($role2);

        $user3 = User::create([
            "name" => "Jason",
            "email" => "jason.burns@gmail.com",
            "password" => Hash::make('asdqwe123'),
        ]);
        $user3->assignRole($role3);

        $user4 = User::create([
            "name" => "Mike",
            "email" => "mike.phillips@gmail.com",
            "password" => Hash::make('asdqwe123'),
        ]);
        $user4->assignRole($role4);
    }
}
