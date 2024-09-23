<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);


        $user1 = User::create([
            'first_name' => 'Root',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user1->assignRole([$admin_role->id]);

        $user1 = User::create([
            'first_name' => 'Jan',
            'last_name' => 'Kowalski',
            'position' => 'Head of IT',
            'phone' => '+48 111 222 333',
            'email' => 'jan.kowalski.head.of.it@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user1->assignRole([$user_role->id]);
    }
}
