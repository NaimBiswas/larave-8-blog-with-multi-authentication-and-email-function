<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'author',
            'username' => 'author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('author@gmail.com'),
        ]);
    }
}
