<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
           DB::table('menus')->insert([
                'created_at'    => date("Y-m-d H:i:s"),
                '_lft'          => 1,
                '_rgt'          => 2,
                'parent_id'     => null,
                'type'          => null,
                'path'          => null,
                'css'           => 'fa fa-cog fa-fw',
                'name'          => 'Settings',
                'position'      => Menu::POSITION_SIDEMENU,
                'privilege_id'  => 1,
            ]);
    }
}
