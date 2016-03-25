<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;
use App\Registrant;

use Input;
use Session;
use Validator;

class PendaftaranController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $classrooms = Classroom::select('id', 'name')->get();
        return view('form.PendaftarForm', ['classrooms' => $classrooms]);
    }

    public function store(Request $request)
    {
        $data = Input::all();
        $transkrip = Input::file('transkrip');

        $rules = [
            'name' => 'required',
            'NRP' => 'required',
            'ipk' => 'required',
            'kelas' => 'required',
            'nilai_kelas' => 'required',
            'transkrip' => 'required|mimes:c,cpp'
        ];

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return view('form.PendaftaranForm')
                    ->withErrors($validator)
                    ->withInput($data);
        }

        $registrant = new Registrant();
        $registrant->NRP = $data['NRP'];
        $registrant->name = $data['name'];
        $registrant->gpa = $data['ipk'];
        $registrant->mark = $data['nilai_kelas'];
        $registrant->classroom_id = $data['kelas'];
        $registrant->save();

        $file_name = (string)$registrant->id.'_ladolcevita.jpg';

        $destination_path = storage_path().'/transkrip';
        if(!$transkrip->move($destination_path, $file_name)){
            Session::flash('fail', 'Gagal mengupload file transkrip');
            return redirect()->route('daftar.create');
        }
        Session::flash('success', 'Pendaftaran berhasil dilakukan');
        return redirect()->route('daftar.create');
    }
}
