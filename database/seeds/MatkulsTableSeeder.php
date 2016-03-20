<?php

use Illuminate\Database\Seeder;

class MatkulsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkuls')->insert([
            ['name' => 'Aljabar Linear'],
            ['name' => 'Dasar Pemrograman'],
            ['name' => 'Pemrograman Berorientasi Objek'],
            ['name' => 'Struktur Data'],
            ['name' => 'Pemrograman Web'],
            ['name' => 'Kecerdasan Buatan'],
            ['name' => 'Analisis dan Perancangan Sistem Informasi'],
            ['name' => 'Komputasi Numerik'],
            ['name' => 'Pemrograman Jaringan'],
            ['name' => 'Perancangan Perangkat Lunak'],
            ['name' => 'Probabilitas dan Statistik'],
            ['name' => 'Teori Graf'],
            ['name' => 'Organisasi Komputer']
        ]);
    }
}
