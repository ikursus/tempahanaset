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
        # User 1
        DB::table('users')->insert([
            'name' => 'The Admin',
            'email' => 'theadmin@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => '01231654987',
            'address' => 'No.123 Tmn Maju Jaya Kuala Lumpur',
            'ic' => '808080088888',
            'role' => 'admin'
        ]);

        # User 2
        DB::table('users')->insert([
            'name' => 'The Demo',
            'email' => 'thedemo@gmail.com',
            'password' => bcrypt('demo'),
            'phone' => '01231654987',
            'address' => 'No.555 Tmn Berjaya Kuala Lumpur',
            'ic' => '9090909090909',
            'role' => 'user'
        ]);
    }
}
