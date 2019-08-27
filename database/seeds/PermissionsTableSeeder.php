<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-08-27 13:29:01',
            'updated_at' => '2019-08-27 13:29:01',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '17',
                'title'      => 'restaurant_create',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '18',
                'title'      => 'restaurant_edit',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '19',
                'title'      => 'restaurant_show',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '20',
                'title'      => 'restaurant_delete',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '21',
                'title'      => 'restaurant_access',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '22',
                'title'      => 'category_create',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '23',
                'title'      => 'category_edit',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '24',
                'title'      => 'category_show',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '25',
                'title'      => 'category_delete',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '26',
                'title'      => 'category_access',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '27',
                'title'      => 'order_create',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '28',
                'title'      => 'order_edit',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '29',
                'title'      => 'order_show',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '30',
                'title'      => 'order_delete',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '31',
                'title'      => 'order_access',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '32',
                'title'      => 'product_create',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '33',
                'title'      => 'product_edit',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '34',
                'title'      => 'product_show',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '35',
                'title'      => 'product_delete',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '36',
                'title'      => 'product_access',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '37',
                'title'      => 'status_create',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '38',
                'title'      => 'status_edit',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '39',
                'title'      => 'status_show',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '40',
                'title'      => 'status_delete',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ],
            [
                'id'         => '41',
                'title'      => 'status_access',
                'created_at' => '2019-08-27 13:29:01',
                'updated_at' => '2019-08-27 13:29:01',
            ]];

        Permission::insert($permissions);
    }
}
