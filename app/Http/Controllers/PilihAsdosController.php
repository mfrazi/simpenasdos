<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;
use App\Registrant;

use Auth;
use File;
use Input;
use Response;
use Session;
use Validator;

class PilihAsdosController extends Controller
{
    public function index()
    {
        $role_id = Auth::user()->role_id;

        if($role_id == 1){
            $classrooms = Classroom::whereHas('classuser', function($query){
                            $user_id = Auth::user()->id;
                            $query->where('user_id', '=', $user_id);
                        })->get();
        }

        else if($role_id == 3){
            $classrooms = Classroom::all();
        }
        //return $classroom;
        return view('form.PilihAsdosForm', ['classrooms' => $classrooms]);
    }

    public function getregistrant($id){
        $role_id = Auth::user()->role_id;
        if($role_id == 1){
            $registrants = Registrant::where('classroom_id', '=', $id)
                        ->whereHas('classroom.classuser', function($query){
                            $user_id = Auth::user()->id;
                            $query->where('user_id', '=', $user_id);
                        })->get();
        }
        else if($role_id == 3){
            $registrants = Registrant::whereHas('classroom', function($query) use($id){
                                $query->where('id', '=', $id);
                            })->get();
        }
        return Response::json($registrants);
    }

    public function update()
    {
        $data = Input::get('id');
        $id = explode("_", $data)[1];
        $registrant = Registrant::find($id);
        if($registrant->status == 0)
            $registrant->status = 1;
        else
            $registrant->status = 0;
        $registrant->save();
        return "ok";
    }

    public function trankrip($id){
        $exts = array('png','jpg', 'doc', 'docx', 'txt', 'cpp');
        $path = "";
        foreach($exts as $ext) {
            if(file_exists(storage_path().'/transkrip/'.$id.'transkripxyz.'.$ext)){
                $path = storage_path().'/transkrip/'.$id.'transkripxyz.'.$ext;
            }
        }
        $extension = File::extension($path);
        $type = File::mimeType($path);
        $headers = ['Content-Type: '.$type];
        return Response::download($path, $id.'transkripxyz.'.$extension, $headers);
    }

    public function showAssistant() {
        $assistants = Registrant::where('status', true)->with('classroom')->get();
        return view('index.ListAsistenIndex', ['assistants'=>$assistants]);
    }

    public  function showCloseRegForm() {
        $setting = Setting::all();
        $semester_id = $setting[0]->semester_id;
        $classrooms = Classroom::where('semester_id', $semester_id)->get();
        return view('form.CloseRegForm', ['classrooms'=>$classrooms]);
    }

    public function addAssistant() {
        $data = Input::all();

        $rules = [
            'name' => 'required',
            'NRP' => 'required',
            'kelas' => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            Session::flash('fail', 'Gagal melakukan pendaftaran');
            return redirect()->route('daftar.create');
        }

        $registrant = new Registrant();
        $registrant->NRP = $data['NRP'];
        $registrant->name = $data['name'];
        $registrant->classroom_id = $data['kelas'];
        $registrant->status = 1;
        $registrant->save();

        Session::flash('success', 'Penambahan asisten berhasil');
        return redirect()->route('asisten.show');
    }
}
