<?php

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
            DB::table('privileges')->insert([
                'name'          => 'Super Administrator',
                'is_superadmin' => true,
                'theme_color'   => 'skin-red',
            ]);
    }
}
