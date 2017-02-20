<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
           DB::table('users')->insert([
                'firstname'     => 'Admin',
                'lastname'      => 'Superadmin',
                'email'         => 'info@abado-it.de',
                'password'      => '$2y$10$09jrIqy6QQJtJIGYMU6HZuBX46wuH8CSa6pEBCfuPJc6RK4mQKuDq',
                'privilege_id'  => 1
            ]);
    }
}
