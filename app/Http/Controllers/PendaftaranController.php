<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Setting;
use App\Classroom;
use App\Registrant;

use Input;
use Session;
use Validator;

class PendaftaranController extends Controller {
    private $setting = [];
    
    public function __construct() {
        $settings = Setting::all();
        $this->setting['semester_id'] = $settings[0]->semester_id;
        $this->setting['status_pendaftaran'] = $settings[0]->status_pendaftaran;
    }
    
    private function createRegistrant($data, $class, $mark) {
        $registrant = new Registrant();
        $registrant->NRP = $data['NRP'];
        $registrant->name = $data['name'];
        $registrant->gpa = $data['ipk'];
        $registrant->phone_number = $data['phone_number'];
        $registrant->classroom_id = $class;
        $registrant->mark = $mark;
        $registrant->is_experienced = isset($data['pengalaman']);
        $registrant->save();
        return $registrant->id;
    }
    
    public function create() {
        $classrooms = Classroom::where('semester_id', $this->setting['semester_id'])->get();
        return view('form.PendaftaranForm', [
            'classrooms' => $classrooms,
            'pendaftaran' => $this->setting['status_pendaftaran']
        ]);
    }

    public function store(Request $request) {
        if($this->setting['status_pendaftaran'] == 0)
            return redirect()->route('berandaumum');

        $data = $request->all();
        $transkrip = Input::file('transkrip');
        $ext = $transkrip->getClientOriginalExtension();

        $rules = [
            'name' => 'required',
            'NRP' => 'required',
            'ipk' => 'required',
            'phone_number' => 'required',
            'kelas1' => 'required',
            'nilai_kelas1' => 'required',
            'transkrip' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            Session::flash('fail', 'Gagal melakukan pendaftaran, pastikan semua data sudah diisi dengan benar');
            return redirect()->route('daftar.create');
        }
        if($ext != "doc" && $ext != "docx"){
            Session::flash('fail', 'Gagal mengunggah file transkrip, pastikan file sesuai format yang ditentukan');
            return redirect()->route('daftar.create');
        }
        if (isset($data['kelas2']) && ($data['kelas1'] == $data['kelas2'])) {
            Session::flash('fail', 'Kelas yang dipilih tidak boleh sama');
            return redirect()->route('daftar.create');
        }

        $registrant = $this->createRegistrant($data, $data['kelas1'], $data['nilai_kelas1']);
        $file_name = (string)$registrant.'transkripxyz.'.$ext;
        $destination_path = storage_path().'/transkrip';
        if(!$transkrip->move($destination_path, $file_name)){
            Session::flash('fail', 'Gagal mengupload file transkrip');
            return redirect()->route('daftar.create');
        }

        if (isset($data['kelas2'])) {
            $registrant = $this->createRegistrant($data, $data['kelas2'], $data['nilai_kelas2']);
            $file_name2 = (string)$registrant.'transkripxyz.'.$transkrip->getClientOriginalExtension();

            $transkrip = $destination_path."/".$file_name;
            $destination_path2 = storage_path().'/transkrip';
            $transkrip2 = $destination_path2."/".$file_name2;
            
            if(!copy($transkrip, $transkrip2)){
                Session::flash('fail', 'Gagal mengupload file transkrip');
                return redirect()->route('daftar.create');
            }
        }
        Session::flash('success', 'Pendaftaran asisten dosen berhasil dilakukan. Terima kasih.');
        return redirect()->route('daftar.create');
    }
}
