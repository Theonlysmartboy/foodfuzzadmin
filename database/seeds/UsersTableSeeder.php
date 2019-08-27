<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$L6tJj0j1C2uccjAA1jQPreYlyiGySJKY.1a/lEerlIO5f82LeU2DC',
            'remember_token' => null,
            'created_at'     => '2019-08-27 11:15:30',
            'updated_at'     => '2019-08-27 11:15:30',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
