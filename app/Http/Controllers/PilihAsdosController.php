<?php

namespace App\Http\Controllers;

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
        return view('show.PilihAsdos', ['classrooms' => $classrooms]);
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
        $path = storage_path().'/transkrip/'.$id.'transkripxyz.cpp';
        $type = File::mimeType($path);
        $headers = ['Content-Type: '.$type];
        return Response::download($path, $id.'transkripxyz.cpp', $headers);
    }
}
