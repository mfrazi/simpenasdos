<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;
use App\Classuser;
use App\Matkul;
use App\User;

use Input;
use Session;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Classroom::with('matkul')->groupBy('matkul_id')->select('matkul_id')->get();
        //return $kelas;
        return view('index.kelas', ['kelas' => $kelas]);
    }

    public function create()
    {
        $matkuls = Matkul::all();
        return view('form.KelasForm', ['matkuls' => $matkuls]);
    }

    public function store()
    {
        $kelas = Matkul::find(Input::get('kelas'))->name;
        $jumlah = intval(Input::get('jumlah'))+64;
        for($i=65; $i<=$jumlah; $i++){
            $data = $kelas." ".chr($i);
            $class = new Classroom();
            $class->name = $data;
            $class->matkul_id = Input::get('kelas');
            $class->save();
        }
        Session::flash('success', 'Kelas baru berhasil ditambahkan');
        return redirect()->route('kelas.create');
    }

    public function show($id)
    {
        $classroom = Classroom::where('matkul_id','=',$id)->with('classuser')->get();
        $dosen = User::select('id','name')->where('role_id', '=', 1)->get();
        return view('show.kelas', ['kelas' => $classroom, 'dosen' => $dosen]);
    }

    public function edit($id)
    {
        //
    }

    public function update()
    {
        return Input::all();
    }

    public function destroy($id)
    {
        //
    }
}
