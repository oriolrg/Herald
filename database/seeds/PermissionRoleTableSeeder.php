<?php

use Illuminate\Database\Seeder;
//use DB;
use \App\permission_roles;
class PermissionRoleTableSeeder extends Seeder
{
    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $permissionRole = [

            [

                'permission_id' => '1',

                'role_id' => '1',


            ],

            [

                'permission_id' => '2',

                'role_id' => '1',

            ],

            [

                'permission_id' => '3',

                'role_id' => '1',


            ],

            [

                'permission_id' => '4',

                'role_id' => '1',

            ],
            [

                'permission_id' => '5',

                'role_id' => '1',


            ],

            [

                'permission_id' => '6',

                'role_id' => '1',

            ],            [

                'permission_id' => '7',

                'role_id' => '1',


            ],

            [

                'permission_id' => '8',

                'role_id' => '1',

            ]

        ];


        foreach ($permissionRole as $key => $value) {

            \App\permission_roles::create($value);

        }

    }

}