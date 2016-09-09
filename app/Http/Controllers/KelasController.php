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
                    ->orderBy('name')
                    ->where('semester_id', '=', $this->semester_aktif)
                    ->groupBy('course_id')->select('course_id')
                    ->get();
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
        $kelas_ada = Classroom::where('course_id', '=', Input::get('kelas'))
                        ->where('semester_id', '=', $this->semester_aktif)
                        ->orderBy('name', 'ASC')
                        ->get();

        $counterClass = 65;
        $emptyClass = [];
        foreach ($kelas_ada as $ka){
            $getClass = $ka->name[strlen($ka->name)-1];
            if(chr($counterClass) != $getClass) {
                array_push($emptyClass, chr($counterClass));
                $counterClass = $counterClass+1;
            }
            $counterClass = $counterClass+1;
        }

        while (count($emptyClass)<intval(Input::get('jumlah'))){
            array_push($emptyClass, chr($counterClass));
            $counterClass = $counterClass+1;
        }

        foreach ($emptyClass as $eC){
            $data = $kelas." ".$eC;
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
                     ->with('classuser')
                     ->orderBy('name', 'ASC')->get();
        $dosen = User::select('id','name')->where('role_id', '=', 1)->get();
        return view('form.KelasEditForm', ['kelas' => $classroom, 'dosen' => $dosen, 'navbar' => 2]);
    }

    public function update()
    {
        $data = Input::all();
        $kelas_id = "";
        $last = "";
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
            $last[0] = $key;
            $last[1] = $kelas_id;
        }

        if(strpos($last[0], 'kelasname') !== false) {
            $classuser = Classuser::where('classroom_id', '=', $last[1])->get();
            if(!empty($classuser)){
                Classuser::where('classroom_id', '=', $last[1])->delete();
            }
        }

        Session::flash('success', 'Data kelas berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $classroom = Classroom::find($id);
        if(count($classroom->classuser)==0 && count($classroom->registrant)==0) {
            $classroom->delete();
            Session::flash('success', 'Data kelas berhasil dihapus');
            return redirect()->back();
        }
        else{
            abort(404);
        }
    }
}
