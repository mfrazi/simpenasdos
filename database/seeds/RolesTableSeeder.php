<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'type' => 'dosen'
        ]);
        DB::table('roles')->insert([
            'type' => 'admin'
        ]);
        DB::table('roles')->insert([
            'type' => 'kaprodi'
        ]);
        DB::table('roles')->insert([
            'type' => 'superuser'
        ]);
    }
}
