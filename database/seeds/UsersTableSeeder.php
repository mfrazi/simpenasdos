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
            'name' => 'Dosen',
            'username' => 'dosen',
            'password' => Hash::make('sokdosen'),
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('sokadmin'),
            'role_id' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'Kaprodi',
            'username' => 'kaprodi',
            'password' => Hash::make('sokkaprodi'),
            'role_id' => 3,
        ]);
    }
}
