<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

          $user = User::create([
            'username' => 'Dr.Steve',
            'name' => 'Steve Deemer',
            'email' => 'dr.steve@example.com',
            'password' => bcrypt('password'), // Replace with a secure password
            'address' => '123 Main St',
            'city' => 'Cityville',
            'state' => 'ST',
            'zip' => '12345',
            'lat' => 0.0,
            'lng' => 0.0,
        ]);

// Roles
//    Role::create(['name' => 'admin']);

    Role::create(['name' => 'user']);

    // Permissions
//    Permission::create(['name' => 'edit articles']);
    Permission::create(['name' => 'publish articles']);


 // Create an admin role
        $adminRole = Role::create(['name' => 'admin']);

        // Create a permission
        $editArticlesPermission = Permission::create(['name' => 'edit articles']);

        // Assign the admin role to the user
        $user->assignRole($adminRole);

        // Give the user the 'edit articles' permission
        $user->givePermissionTo($editArticlesPermission);
 
    }
}
