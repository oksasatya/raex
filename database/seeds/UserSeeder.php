<?php

namespace Database\Seeders;


use App\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);


        $user1 = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'address' => 'Jl. Raya Cikarang',
            // int value
            'phone_number' => rand(0, 999999999),
            'password' => bcrypt('12345678'),
        ]);
        $user1->assignRole($role1);

        $user2 = User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'address' => 'Jl. Raya Cikarang2',
            //set int value 12 digit number (0-9)
            'phone_number' => rand(0, 999999999),
            'password' => bcrypt('12345678'),
        ]);
        $user2->assignRole($role2);
    }
}