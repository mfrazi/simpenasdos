<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;
use App\Registrant;
use App\Setting;

use Auth;
use Excel;
use File;
use Input;
use Response;
use Session;
use Validator;

class AsistenDosenController extends Controller
{
    public function index()
    {
        $role_id = Auth::user()->role_id;

        if($role_id == 1){
            $classrooms = Classroom::where('semester_id', '=', Setting::find(1)->semester_id)
                        ->whereHas('classuser', function($query){
                            $user_id = Auth::user()->id;
                            $query->where('user_id', '=', $user_id);
                        })->get();
            $pilih = 1;
        }

        else if($role_id == 3){
            $classrooms = Classroom::where('semester_id', '=', Setting::find(1)->semester_id)->get();
            $pilih = Setting::find(1)->status_kaprodi;
        }
        
        return view('form.PilihAsdosForm', ['classrooms' => $classrooms, 'pilih' => $pilih, 'navbar' => 1]);
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
        $exts = array('png','jpg', 'jpeg', 'pdf', 'doc', 'docx', 'txt', 'xls');
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
        $semester_aktif = Setting::find(1)->semester_id;
        $assistants = Registrant::where('status', true)
                                    ->whereHas('classroom', function($query) use($semester_aktif){
                                        $query->where('semester_id', '=', $semester_aktif);
                                    })
                                    ->with('classroom')->get();
        return view('index.AsistenIndex', ['assistants'=>$assistants, 'navbar' => 5]);
    }

    public  function showCloseRegForm() {
        $setting = Setting::all();
        $semester_id = $setting[0]->semester_id;
        $classrooms = Classroom::where('semester_id', $semester_id)->get();
        return view('form.CloseRegForm', ['classrooms'=>$classrooms, 'navbar' => 5]);
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

    public function downloadDaftarAsisten(){
        $status_pengumuman = Setting::find(1)->status_pengumuman;
        $semester_aktif = Setting::find(1)->semester_id;
        $role = -1;

        $tmp_data = $assistants = Registrant::where('status', true)
                            ->whereHas('classroom', function($query) use($semester_aktif){
                                $query->where('semester_id', '=', $semester_aktif);
                            })->select('NRP', 'name', 'classroom_id')->with('classroom')->get();

        $data = [];
        $cnt = 1;
        foreach($tmp_data as $x){
            $tmp = [];
            $tmp['No'] = $cnt;
            $tmp['NRP'] = $x->NRP;
            $tmp['Nama'] = $x->name;
            $tmp['Kelas'] = $x->classroom->name;
            $cnt = $cnt + 1;
            array_push($data, $tmp);
        }

        if(Auth::check())
            $role = Auth::user()->role_id;
        if($role == 2 || $status_pengumuman==1){
            Excel::create('Daftar Asisten Dosen', function($excel) use($data){
                $excel->sheet('Asisten Dosen', function($sheet) use($data){
                    $sheet->fromArray($data);
                });
            })->export('xls');
        }
        else{
            return route('berandaumum');
        }
    }
}
