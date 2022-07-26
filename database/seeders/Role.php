<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role as RoleModel;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new RoleModel();
        $role1->role = 'Administrator';
        $role1->save();

        $role2 = new RoleModel();
        $role2->role = 'Staff';
        $role2->save();

        $role3 = new RoleModel();
        $role3->role = 'Customer';
        $role3->save();
    }
}
