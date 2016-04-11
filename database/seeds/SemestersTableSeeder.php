<?php

use Illuminate\Database\Seeder;

class SemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
            [
                'name' => 'Semester Ganjil Tahun Pelajaran 2016/2017',
                'year' => 2016
            ],
            [
                'name' => 'Semester Genap Tahun Pelajaran 2016/2017',
                'year' => 2017
            ]
        ]);

        DB::table('settings')->insert([
                'semester_id' => 1
        ]);
    }
}
