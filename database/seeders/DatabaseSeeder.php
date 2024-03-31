<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Profile;
use App\Models\PictureLibrary;
use Faker\Factory as Faker;

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
            'email' => 'dr.steve@steven.news',
            'password' => bcrypt('password'), // Replace with a secure password
            'address' => '123 Main St',
            'city' => 'Hollywood',
            'state' => 'FL',
            'zip' => '33020',
            'lat' => 0.0,
            'lng' => 0.0,
            'birth_date' =>'1964-10-27'
        ]);
                   // Create a profile for the user
        $user->profile()->create([
            // You can set additional profile fields here if needed
            'public' =>1,
            'profile_picture' => 'profile_pictures/me2.jpg',
            'picture_library' => '1',
        ]);
        //$user->pricture
         $profile = $user->profile;
         $profile->pictureLibrary()->create([
            'user_id' => '1',
            'profile_id' => '1',
            'picture_location' => 'public/profile_pictures/me2.jpg',
     
        ]);

// Roles
//    Role::create(['name' => 'admin']);

  $newuser =  Role::create(['name' => 'user']);

  $testuser =  Role::create(['name' => 'testuser']);

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
 
    

 $user = User::create([
               'username' => 'Kristin',
               'name' => 'Kristin Keeper',
               'email' => 'abc@abc.com',
               'password' => bcrypt('password'), // Replace with a secure password
                // Add other fields as needed
               'birth_date' => '1977-10-24', // 47 years old
                'created_at' => now(),
                'updated_at' => now(),
            ]);

             $user->profile()->create([
            // You can set additional profile fields here if needed
            'public' =>1,
            'profile_picture' => 'profile_pictures/kristin1.jpg',
            'picture_library' => '2',
        ]);
         $profile = $user->profile;
         $profile->pictureLibrary()->create([
            'user_id' => '2',
            'profile_id' => '2',
            'picture_location' => 'public/profile_pictures/kristin1.jpg',
     
        ]);
          $profile->pictureLibrary()->create([
            'user_id' => '2',
            'profile_id' => '2',
            'picture_location' => 'public/profile_pictures/kristin2.jpg',
     
        ]);
          $profile->pictureLibrary()->create([
            'user_id' => '2',
            'profile_id' => '2',
            'picture_location' => 'public/profile_pictures/kristin3.jpg',
     
        ]);
          $profile->pictureLibrary()->create([
            'user_id' => '2',
            'profile_id' => '2',
            'picture_location' => 'public/profile_pictures/kristin4.jpg',
     
        ]);


 // Assign the admin role to the user
        $user->assignRole($newuser);
        































$faker = Faker::create();

        // Create 10 users
        foreach (range(1, 100) as $index) {
            $user = User::create([
               'username' => $faker->username,
               'name' => $faker->name,
               'email' => $faker->unique()->safeEmail,
               'password' => bcrypt('password'), // Replace with a secure password
                // Add other fields as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);

             $user->profile()->create([
            // You can set additional profile fields here if needed
            'public' =>1,
        ]);
        // $user->assignRole($newuser);
         $user->assignRole($testuser);
        
        }




    }
}
