<?php

use Illuminate\Database\Seeder;
use App\Model\Menu;

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
                'type'          => Menu::TYPE_MODULE,
                'path'          => 'users',
                'css'           => 'normal',
                'name'          => 'Test',
                'icon'          => 'fa fa-glass',
                'parent_id'     => '0',
                'is_dashboard'  => false,
                'privilege_id'  => 1,
            ]);
    }
}
