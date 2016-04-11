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
            ['type' => 'dosen'],
            ['type' => 'admin'],
            ['type' => 'kaprodi'],
            ['type' => 'superuser']
        ]);
    }
}
