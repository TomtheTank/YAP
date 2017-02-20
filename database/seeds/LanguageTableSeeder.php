<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
           DB::table('languages')->insert([
                'default'      => true,
                'name'         => 'English (UK)',
                'iso639'       => 'en',
                'iso3166'      => 'gb',
                'short_date'   => 'd/m/Y',
                'long_date'    => 'd/m/Y H:i:s',
            ]);
    }
}
