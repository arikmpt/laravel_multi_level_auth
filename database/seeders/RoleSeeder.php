<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ROLES = ['admin','operator','user'];

        foreach ($ROLES as $index => $role) {
            Role::firstOrCreate([
                'name' => $role
            ], [
                'name' => $role
            ]);
        }
    }
}
