<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Semester;
use App\Setting;

use Input;
use Session;

class PengaturanController extends Controller
{
    public function index(){
        $semesters = Semester::all();
        $setting = Setting::all()->first();
        return view('form.PengaturanForm', ['semesters' => $semesters, 'setting' => $setting]);
    }

    public function update(){
        $semester = Input::get('semester');
        $total_semester = Semester::all()->count();

        if($total_semester == $semester){
            $current_semster = Semester::find($semester);
            $year = $current_semster->year;
            $semester_ganjil = new Semester();
            $semester_ganjil->name = "Semester Ganjil Tahun Pelajaran ".(string)$year."/".(string)($year+1);
            $semester_ganjil->year = $year;
            $semester_ganjil->save();
            $semester_genap = new Semester();
            $semester_genap->name = "Semester Genap Tahun Pelajaran ".(string)$year."/".(string)($year+1);
            $semester_genap->year = $year+1;
            $semester_genap->save();
        }

        $setting = Setting::first();

        $setting->semester_id = $semester;

        if(Input::get('status_pendaftaran') == "on")
            $setting->status_pendaftaran = 1;
        else
            $setting->status_pendaftaran = 0;
        if(Input::get('status_pengumuman')  == "on")
            $setting->status_pengumuman = 1;
        else
            $setting->status_pengumuman = 0;
        if(Input::get('status_kaprodi')  == "on")
            $setting->status_kaprodi = 1;
        else
            $setting->status_kaprodi = 0;

        $setting->save();

        Session::flash('success', 'Pengaturan berhasil diubah');
        return redirect()->route('pengaturan');
    }
}
