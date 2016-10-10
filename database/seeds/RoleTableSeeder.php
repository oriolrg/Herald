<?php

use Illuminate\Database\Seeder;

use App\Role;


class RoleTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $role = [

            [

                'name' => 'admin',

                'display_name' => 'Administrador web',

                'description' => 'Administrador de l\'aplicació'

            ],

            [

                'name' => 'escriptor',

                'display_name' => 'Escriu Articles',

                'description' => 'Pot escriure, modificar i borrar articles'

            ],



        ];


        foreach ($role as $key => $value) {

            Role::create($value);

        }

    }

}