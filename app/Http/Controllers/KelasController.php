<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;
use App\Classuser;
use App\Course;
use App\Setting;
use App\User;

use Input;
use Session;

class KelasController extends Controller
{
    protected $semester_aktif;

    public function __construct(){
        $this->semester_aktif = Setting::find(1)->semester_id;
    }

    public function index()
    {
        $classroom = Classroom::with('course')
                    ->where('semester_id', '=', $this->semester_aktif)
                    ->groupBy('course_id')->select('course_id')->get();
        return view('index.KelasIndex', ['classrooms' => $classroom, 'navbar' => 2]);
    }

    public function create()
    {
        $courses = Course::all();
        return view('form.KelasForm', ['courses' => $courses, 'navbar' => 2]);
    }

    public function store()
    {
        $kelas = Course::find(Input::get('kelas'))->name;
        $jumlah_ada = Classroom::where('course_id', '=', Input::get('kelas'))
                        ->where('semester_id', '=', $this->semester_aktif)
                        ->count();
        $jumlah = intval(Input::get('jumlah'))+64+$jumlah_ada;
        for($i=65+$jumlah_ada; $i<=$jumlah; $i++){
            $data = $kelas." ".chr($i);
            $class = new Classroom();
            $class->name = $data;
            $class->course_id = Input::get('kelas');
            $class->semester_id = $this->semester_aktif;
            $class->save();
        }
        Session::flash('success', 'Kelas baru berhasil ditambahkan');
        return redirect()->route('kelas.create', ['navbar' => 2]);
    }

    public function show($id)
    {
        $classroom = Classroom::where('course_id','=',$id)
                     ->where('semester_id', '=', $this->semester_aktif)
                     ->with('classuser')->get();
        $dosen = User::select('id','name')->where('role_id', '=', 1)->get();
        return view('form.KelasEditForm', ['kelas' => $classroom, 'dosen' => $dosen, 'navbar' => 5]);
    }

    public function update()
    {
        $data = Input::all();
        $kelas_id = "";
        foreach($data as $key => $value){
            if($kelas_id != "" && strpos($key, 'kelasid') !== false){
                $classuser = Classuser::where('classroom_id', '=', $kelas_id)->get();
                if(!empty($classuser)){
                    Classuser::where('classroom_id', '=', $kelas_id)->delete();
                }
                $kelas_id = $value;
            }
            elseif(strpos($key, 'kelasid') !== false){
                $kelas_id = $value;
            }
            elseif (strpos($key, 'dosen') !== false) {
                $classuser = Classuser::where('classroom_id', '=', $kelas_id)->get();
                if(!empty($classuser)){
                    Classuser::where('classroom_id', '=', $kelas_id)->delete();
                }
                foreach ($value as $dosen) {
                    $classuser = new Classuser();
                    $classuser->classroom_id = $kelas_id;
                    $classuser->user_id = $dosen;
                    $classuser->save();
                }
                $kelas_id="";
            }
        }
        Session::flash('success', 'Data kelas berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $classuser = Classuser::where('classroom_id', '=', $id);
        $classuser->delete();
        $classroom = Classroom::find($id);
        $classroom->delete();
        Session::flash('success', 'Data kelas berhasil dihapus');
        return redirect()->back();
    }
}
