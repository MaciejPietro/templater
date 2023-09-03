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
            'first_name' => 'Maciej',
            'last_name' => 'Pietrolaj',
            'email' => 'maciek.pietrolaj@il2d.com',
            'password' => Hash::make('password'),
        ]);
        $user1->assignRole([$admin_role->id]);
    }
}
