<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['loper', 'admin', 'sponsoren'];

        foreach ($roles as $role) {
            Role::create(['naam' => $role]);
        }
    }
}
