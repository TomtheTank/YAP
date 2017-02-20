<?php

use Illuminate\Database\Seeder;

class PrivilegeRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => false,
                'is_read'       => false,
                'is_edit'       => false,
                'is_delete'     => false,
                'is_export'     => false,
                'privilege_id'  => 1,
                'module_id'     => 1
            ]);
           
           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 2
            ]);
           
           DB::table('privilege_roles')->insert([
                'is_visible'    => false,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 3
            ]);
           
           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 4
            ]);
           
           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 5
            ]);
           
           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 6
            ]);

           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 7
            ]);
           
           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 8
            ]);
           
           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 9
            ]);
           
           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => true,
                'is_read'       => true,
                'is_edit'       => true,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 10
            ]);

           DB::table('privilege_roles')->insert([
                'is_visible'    => true,
                'is_create'     => false,
                'is_read'       => true,
                'is_edit'       => false,
                'is_delete'     => true,
                'is_export'     => true,
                'privilege_id'  => 1,
                'module_id'     => 11
            ]);
    }
}
