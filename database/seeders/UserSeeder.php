<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $getRoleAdmin = Role::where('name','admin')->first();

        if($getRoleAdmin) {
            User::firstOrCreate([
                'email' => 'admin@email.com'
            ], [
                'email' => 'admin@email.com',
                'password' => bcrypt('123456789'),
                'role_id' => $getRoleAdmin->id
            ]);
        }

        $getRoleOperator = Role::where('name','operator')->first();

        if($getRoleOperator) {
            User::firstOrCreate([
                'email' => 'operator@email.com'
            ], [
                'email' => 'operator@email.com',
                'password' => bcrypt('123456789'),
                'role_id' => $getRoleOperator->id
            ]);
        }

        $getRoleUser = Role::where('name','user')->first();

        if($getRoleUser) {
            User::firstOrCreate([
                'email' => 'user@email.com'
            ], [
                'email' => 'user@email.com',
                'password' => bcrypt('123456789'),
                'role_id' => $getRoleUser->id
            ]);
        }
    }
}
