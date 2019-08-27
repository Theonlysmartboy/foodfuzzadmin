<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [[
            'id'         => 1,
            'title'      => 'Admin',
            'created_at' => '2019-08-27 11:15:30',
            'updated_at' => '2019-08-27 11:15:30',
            'deleted_at' => null,
        ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2019-08-27 11:15:30',
                'updated_at' => '2019-08-27 11:15:30',
                'deleted_at' => null,
            ]];

        Role::insert($roles);
    }
}
