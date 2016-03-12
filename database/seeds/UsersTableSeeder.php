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
        DB::table('users')->insert([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('sokadmin'),
            'role_id' => 2,
        ]);
    }
}
