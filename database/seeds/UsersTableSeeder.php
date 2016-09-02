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
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'NIP' => '-',
                'password' => Hash::make('sokadmin'),
                'role_id' => 2
            ],[
                'name' => 'Kaprodi',
                'username' => 'kaprodi',
                'NIP' => '-',
                'password' => Hash::make('sokkaprodi'),
                'role_id' => 3
            ],[
                'name' => 'Prof. Drs. Ec. Ir. Riyanarto Sarno, M.Sc Ph.D',
                'username' => '195908031986011001',
                'NIP' => '195908031986011001',
                'password' => Hash::make('195908031986011001'),
                'role_id' => 1
            ],[
                'name' => 'Prof.Ir. Supeno Djanali, M.Sc., Ph.D',
                'username' => '194806191973011001',
                'NIP' => '194806191973011001',
                'password' => Hash::make('194806191973011001'),
                'role_id' => 1
            ],[
                'name' => 'Prof.Ir. Handayani Tjandrasa, M.Sc., Ph.D',
                'username' => '194908231976032001',
                'NIP' => '194908231976032001',
                'password' => Hash::make('194908231976032001'),
                'role_id' => 1
            ],[
                'name' => 'Prof.Dr.Ir.Joko Lianto Buliali, M.Sc., Ph.D.',
                'username' => '196707271992031002',
                'NIP' => '196707271992031002',
                'password' => Hash::make('196707271992031002'),
                'role_id' => 1
            ],[
                'name' => 'Dr. Agus Zainal Arifin, S.Kom., M.Kom.',
                'username' => '197208091995121001',
                'NIP' => '197208091995121001',
                'password' => Hash::make('197208091995121001'),
                'role_id' => 1
            ],[
                'name' => 'Dr.Eng. Nanik Suciati, S.Kom., M.Kom.',
                'username' => '197104281994122001',
                'NIP' => '197104281994122001',
                'password' => Hash::make('197104281994122001'),
                'role_id' => 1
            ],[
                'name' => 'Daniel Oranova Siahaan, S.Kom., M.Sc., PDEng',
                'username' => '197411232006041001',
                'NIP' => '197411232006041001',
                'password' => Hash::make('197411232006041001'),
                'role_id' => 1
            ],[
                'name' => 'Mahendrawathi ER, S.T., M.Sc., Ph.D',
                'username' => '197610112006042001',
                'NIP' => '197610112006042001',
                'password' => Hash::make('197610112006042001'),
                'role_id' => 1
            ],[
                'name' => 'Ir. Siti Rochimah, M.T., Ph.D.',
                'username' => '196810021994032001',
                'NIP' => '196810021994032001',
                'password' => Hash::make('196810021994032001'),
                'role_id' => 1
            ],[
                'name' => 'Dr.tech.Ir. Raden Venantius Hari Ginardi, M.Sc.',
                'username' => '196505181992031003',
                'NIP' => '196505181992031003',
                'password' => Hash::make('196505181992031003'),
                'role_id' => 1
            ],[
                'name' => 'Wahyu Saudi, S.Kom., M.M., M.Kom',
                'username' => '197110302002121001',
                'NIP' => '197110302002121001',
                'password' => Hash::make('197110302002121001'),
                'role_id' => 1
            ],[
                'name' => 'Victor Hariadi, S.Si., M.Kom',
                'username' => '196912281994121001',
                'NIP' => '196912281994121001',
                'password' => Hash::make('196912281994121001'),
                'role_id' => 1
            ],[
                'name' => 'Dwi Sunaryono, S.Kom., M.Kom',
                'username' => '197205281997021001',
                'NIP' => '197205281997021001',
                'password' => Hash::make('197205281997021001'),
                'role_id' => 1
            ],[
                'name' => 'Umi Laili Yuhana,S.Kom., M.Sc',
                'username' => '197906262005012002',
                'NIP' => '197906262005012002',
                'password' => Hash::make('197906262005012002'),
                'role_id' => 1
            ],[
                'name' => 'Tohari Ahmad, S.Kom., MIT., Ph.D',
                'username' => '197505252003121002',
                'NIP' => '197505252003121002',
                'password' => Hash::make('197505252003121002'),
                'role_id' => 1
            ],[
                'name' => 'Dr. Royyana Muslim Ijtihadie, S.Kom., M.Kom.',
                'username' => '197708242003041001',
                'NIP' => '197708242003041001',
                'password' => Hash::make('197708242003041001'),
                'role_id' => 1
            ],[
                'name' => 'Feby Artowodini Muqtadiroh,S.Kom,MT.',
                'username' => '198302232009122002',
                'NIP' => '198302232009122002',
                'password' => Hash::make('198302232009122002'),
                'role_id' => 1
            ],[
                'name' => 'Waskitho Wibisono, S.Kom., M.Eng., Ph.D',
                'username' => '197410222000031001',
                'NIP' => '197410222000031001',
                'password' => Hash::make('197410222000031001'),
                'role_id' => 1
            ],[
                'name' => 'Anny Yuniarti, S.Kom., M.Comp.Sc',
                'username' => '198106222005012002',
                'NIP' => '198106222005012002',
                'password' => Hash::make('198106222005012002'),
                'role_id' => 1
            ],[
                'name' => 'Ir. Muchammad Husni, M.Kom',
                'username' => '196002211984031001',
                'NIP' => '196002211984031001',
                'password' => Hash::make('196002211984031001'),
                'role_id' => 1
            ],[
                'name' => 'Dr. Chastine Fatichah, S.Kom., M.Kom.',
                'username' => '197512202001122002',
                'NIP' => '197512202001122002',
                'password' => Hash::make('197512202001122002'),
                'role_id' => 1
            ],[
                'name' => 'Ary Mazharuddin Shiddiqi, S.Kom., M.Comp.Sc',
                'username' => '198106202005012001',
                'NIP' => '198106202005012001',
                'password' => Hash::make('198106202005012001'),
                'role_id' => 1
            ],[
                'name' => 'Ahmad Saikhu, S.SI., MT.',
                'username' => '197107182006041001',
                'NIP' => '197107182006041001',
                'password' => Hash::make('197107182006041001'),
                'role_id' => 1
            ],[
                'name' => 'Dr.Eng. Darlis Herumurti, S.Kom., M.Kom.',
                'username' => '197712172003121001',
                'NIP' => '197712172003121001',
                'password' => Hash::make('197712172003121001'),
                'role_id' => 1
            ],[
                'name' => 'Dr. Radityo Anggoro, S.Kom., M.Sc',
                'username' => '198410162008121002',
                'NIP' => '198410162008121002',
                'password' => Hash::make('198410162008121002'),
                'role_id' => 1
            ],[
                'name' => 'Imam Kuswardayan, S.Kom., MT.',
                'username' => '197612152003121001',
                'NIP' => '197612152003121001',
                'password' => Hash::make('197612152003121001'),
                'role_id' => 1
            ],[
                'name' => 'Bilqis Amaliah, S.Kom., M.Kom',
                'username' => '197509142001122002',
                'NIP' => '197509142001122002',
                'password' => Hash::make('197509142001122002'),
                'role_id' => 1
            ],[
                'name' => 'Yudhi Purwananto, S.Kom., M.Kom.',
                'username' => '197007141997031002',
                'NIP' => '197007141997031002',
                'password' => Hash::make('197007141997031002'),
                'role_id' => 1
            ],[
                'name' => 'Isye Arieshanti, S.Kom., M.Phil',
                'username' => '197804122006042001',
                'NIP' => '197804122006042001',
                'password' => Hash::make('197804122006042001'),
                'role_id' => 1
            ],[
                'name' => 'Diana Purwitasari, S.Kom., M.Sc',
                'username' => '197804102003122001',
                'NIP' => '197804102003122001',
                'password' => Hash::make('197804102003122001'),
                'role_id' => 1
            ],[
                'name' => 'Sarwosri, S.Kom., MT.',
                'username' => '197608092001122001',
                'NIP' => '197608092001122001',
                'password' => Hash::make('197608092001122001'),
                'role_id' => 1
            ],[
                'name' => 'Misbakhul Munir Irfan Subakti, S.Kom., M.Sc.',
                'username' => '197402092002121001',
                'NIP' => '197402092002121001',
                'password' => Hash::make('197402092002121001'),
                'role_id' => 1
            ],[
                'name' => 'Fajar Baskoro, S.Kom., MT.',
                'username' => '197404031999031002',
                'NIP' => '197404031999031002',
                'password' => Hash::make('197404031999031002'),
                'role_id' => 1
            ],[
                'name' => 'Ahmad Muklason,S.Kom.,M.Sc.',
                'username' => '198203022009121009',
                'NIP' => '198203022009121009',
                'password' => Hash::make('198203022009121009'),
                'role_id' => 1
            ],[
                'name' => 'Ir. F.X. Arunanto. M.Sc',
                'username' => '195701011983031004',
                'NIP' => '195701011983031004',
                'password' => Hash::make('195701011983031004'),
                'role_id' => 1
            ],[
                'name' => 'Sholiq,ST.,MT.',
                'username' => '197103132009121001',
                'NIP' => '197103132009121001',
                'password' => Hash::make('197103132009121001'),
                'role_id' => 1
            ],[
                'name' => 'Apol Pribadi Subriadi, ST.,MT.',
                'username' => '197002252009121001',
                'NIP' => '197002252009121001',
                'password' => Hash::make('197002252009121001'),
                'role_id' => 1
            ],[
                'name' => 'Arif Bramantoro, ST., MT.',
                'username' => '197812112002121002',
                'NIP' => '197812112002121002',
                'password' => Hash::make('197812112002121002'),
                'role_id' => 1
            ],[
                'name' => 'Ir. Suhadi Lili',
                'username' => '196907281993031001',
                'NIP' => '196907281993031001',
                'password' => Hash::make('196907281993031001'),
                'role_id' => 1
            ],[
                'name' => 'Ahmad Hoirul Basori, S.Kom.',
                'username' => '198211152006041003',
                'NIP' => '198211152006041003',
                'password' => Hash::make('198211152006041003'),
                'role_id' => 1
            ],[
                'name' => 'Henning Titi Ciptaningtyas, S.Kom., M.Kom.',
                'username' => '198407082010122004',
                'NIP' => '198407082010122004',
                'password' => Hash::make('198407082010122004'),
                'role_id' => 1
            ],[
                'name' => 'Arya Yudhi Wijaya, S.Kom., M.Kom',
                'username' => '198409042010121002',
                'NIP' => '198409042010121002',
                'password' => Hash::make('198409042010121002'),
                'role_id' => 1
            ],[
                'name' => 'Wijayanti Nurul Khotimah, S.Kom., M.Sc',
                'username' => '198603122012122004',
                'NIP' => '198603122012122004',
                'password' => Hash::make('198603122012122004'),
                'role_id' => 1
            ],[
                'name' => 'Rizky Januar Akbar, S.Kom., M.Eng.',
                'username' => '198701032014041001',
                'NIP' => '198701032014041001',
                'password' => Hash::make('198701032014041001'),
                'role_id' => 1
            ],[
                'name' => 'Ratih Nur Esti Anggraini, S.Kom., M.Sc.',
                'username' => '198412102014042003',
                'NIP' => '198412102014042003',
                'password' => Hash::make('198412102014042003'),
                'role_id' => 1
            ],[
                'name' => 'Ridho Rahman Hariadi, S.Kom., M.Sc.',
                'username' => '198702132014041001',
                'NIP' => '198702132014041001',
                'password' => Hash::make('198702132014041001'),
                'role_id' => 1
            ],[
                'name' => 'Abdul Munif, S.Kom., M.Sc.',
                'username' => '198608232015041004',
                'NIP' => '198608232015041004',
                'password' => Hash::make('198608232015041004'),
                'role_id' => 1
            ],[
                'name' => 'Rully Sulaiman, S.Kom.,M.Kom.',
                'username' => '197002131994021001',
                'NIP' => '197002131994021001',
                'password' => Hash::make('197002131994021001'),
                'role_id' => 1
            ],[
                'name' => 'Dini Adni Navastara, S.Kom., M.Sc',
                'username' => '198610172015042001',
                'NIP' => '198610172015042001',
                'password' => Hash::make('198610172015042001'),
                'role_id' => 1
            ],[
                'name' => 'Baskoro Adi Pratomo, S.Kom., M.Kom',
                'username' => '198702182014041001',
                'NIP' => '198702182014041001',
                'password' => Hash::make('198702182014041001'),
                'role_id' => 1
            ],[
                'name' => 'Hudan Studiawan, S.Kom., M.Kom.',
                'username' => '198705112012121003',
                'NIP' => '198705112012121003',
                'password' => Hash::make('198705112012121003'),
                'role_id' => 1
            ],[
                'name' => 'Adhatus Solichah Ahmadiyah, S.Kom., M.Sc',
                'username' => '198508262015042002',
                'NIP' => '198508262015042002',
                'password' => Hash::make('198508262015042002'),
                'role_id' => 1
            ],[
                'name' => 'Nurul Fajrin Ariani, S.Kom., M.Sc.',
                'username' => '198607222015042003',
                'NIP' => '198607222015042003',
                'password' => Hash::make('198607222015042003'),
                'role_id' => 1
            ]
        ]);
    }
}

/*
            [
                'name' => 'Rully Sulaiman, S.Kom.,M.Kom.',
                'username' => '197002131994021001',
                'NIP' => '197002131994021001',
                'password' => Hash::make('197002131994021001'),
                'role_id' => 1
            ],[
                'name' => 'Dini Adni Navastara, S.Kom., M.Sc',
                'username' => '198610172015042001',
                'NIP' => '198610172015042001',
                'password' => Hash::make('198610172015042001'),
                'role_id' => 1
            ],[
                'name' => 'Baskoro Adi Pratomo, S.Kom., M.Kom',
                'username' => '198702182014041001',
                'NIP' => '198702182014041001',
                'password' => Hash::make('198702182014041001'),
                'role_id' => 1
            ],[
                'name' => 'Hudan Studiawan, S.Kom., M.Kom.',
                'username' => '198705112012121003',
                'NIP' => '198705112012121003',
                'password' => Hash::make('198705112012121003'),
                'role_id' => 1
            ],[
                'name' => 'Dr. Radityo Anggoro, S.Kom.,M.Sc.',
                'username' => '',
                'NIP' => ,
                'password' => Hash::make(''),
                'role_id' => 1
            ],[
                'name' => 'Adhatus Solichah Ahmadiyah, S.Kom., M.Sc',
                'username' => '198508262015042002',
                'NIP' => '198508262015042002',
                'password' => Hash::make('198508262015042002'),
                'role_id' => 1
            ],[
                'name' => 'Nurul Fajrin Ariani, S.Kom., M.Sc.',
                'username' => '198607222015042003',
                'NIP' => '198607222015042003',
                'password' => Hash::make('198607222015042003'),
                'role_id' => 1
            ]
 */
