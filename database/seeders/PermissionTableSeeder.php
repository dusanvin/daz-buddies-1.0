<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

  

class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $permissions = [

           'role-list',

           'role-create',

           'role-edit',

           'role-delete',

           'product-list',

           'product-create',

           'product-edit',

           'product-delete',

           'stats-view',

           'persons-view'

           //view_roles_edit_roles,add_roles,delete_roles

        ];

     

        foreach ($permissions as $permission) {

             Permission::create(['name' => $permission]);

        }

    }

}