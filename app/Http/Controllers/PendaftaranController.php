<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Classroom;
use App\Registrant;

use Input;
use Session;
use Validator;

class PendaftaranController extends Controller
{
    public function create()
    {
        $setting = Setting::all();
        $semester_id = $setting[0]->semester_id;
        $pendaftaran = $setting[0]->status_pendaftaran;
        $classrooms = Classroom::where('semester_id', $semester_id)->get();
        return view('form.PendaftaranForm', ['classrooms' => $classrooms, 'pendaftaran' => $pendaftaran]);
    }

    public function store()
    {
        $setting = Setting::all();
        $pendaftaran = $setting[0]->status_pendaftaran;
        if($pendaftaran == 0)
            return redirect()->route('daftar.create');

        $data = Input::all();
        $transkrip = Input::file('transkrip');

        $rules = [
            'name' => 'required',
            'NRP' => 'required',
            'ipk' => 'required',
            'phone_number' => 'required',
            'kelas1' => 'required',
            'nilai_kelas1' => 'required',
            'transkrip' => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            Session::flash('fail', 'Gagal melakukan pendaftaran');
            return redirect()->route('daftar.create');
        }

        if (isset($data['kelas2']) && $data['kelas1'] == $data['kelas2']) {
            Session::flash('fail', 'Kelas yang dipilih tidak boleh sama');
            return redirect()->route('daftar.create');
        }

        $registrant = new Registrant();
        $registrant->NRP = $data['NRP'];
        $registrant->name = $data['name'];
        $registrant->gpa = $data['ipk'];
        $registrant->phone_number = $data['phone_number'];
        $registrant->mark = $data['nilai_kelas1'];
        $registrant->classroom_id = $data['kelas1'];
        $registrant->status = 0;
        if (isset($data['pengalaman'])) $registrant->is_experienced = true;
        else $registrant->is_experienced = false;
        $registrant->save();

        $file_name = (string)$registrant->id.'transkripxyz.'.$transkrip->getClientOriginalExtension();
        //return $file_name;
        $destination_path = storage_path().'/transkrip';
        if(!$transkrip->move($destination_path, $file_name)){
            Session::flash('fail', 'Gagal mengupload file transkrip');
            return redirect()->route('daftar.create');
        }

        if (isset($data['kelas2'])) {
            $registrant = new Registrant();
            $registrant->NRP = $data['NRP'];
            $registrant->name = $data['name'];
            $registrant->gpa = $data['ipk'];
            $registrant->phone_number = $data['phone_number'];
            $registrant->mark = $data['nilai_kelas2'];
            $registrant->classroom_id = $data['kelas2'];
            $registrant->status = 0;
            if (isset($data['pengalaman'])) $registrant->is_experienced = true;
            else $registrant->is_experienced = false;
            $registrant->save();

            $file_name2 = (string)$registrant->id.'transkripxyz.'.$transkrip->getClientOriginalExtension();

            $transkrip = $destination_path."/".$file_name;
            $destination_path2 = storage_path().'/transkrip';
            $transkrip2 = $destination_path2."/".$file_name2;
            
            if(!copy($transkrip, $transkrip2)){
                Session::flash('fail', 'Gagal mengupload file transkrip');
                return redirect()->route('daftar.create');
            }
        }
        Session::flash('success', 'Pendaftaran berhasil dilakukan');
        return redirect()->route('daftar.create');
    }
}
