<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
           'name' => 'Admin',
           'email' => 'admin@admin.com',
           'password' => bcrypt('password'),
        ]);

        \App\User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);
    }
}
