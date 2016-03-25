<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;
use App\Registrant;

use Auth;
use Input;
use Session;

class PilihAsdosController extends Controller
{
    public function index()
    {
        $role_id = Auth::user()->role_id;

        /*
        * Jika dosen, maka hanya bisa memilih asdos
        * untuk mata kuliah yang diajarnya
        */
        if($role_id == 1){
            $registrants = Registrant::with('classroom.classuser')
                        ->whereHas('classroom.classuser', function($query){
                            $user_id = Auth::user()->id;
                            $query->where('user_id', '=', $user_id);
                        })->get();
        }
        /*
        * Jika kaprodi, bisa memilih semua asdos
        */
        else if($role_id == 3){
            $registrants = Registrant::all();
        }
        //return $registrants;
        return view('show.PilihAsdos', ['registrants' => $registrants]);
    }

    public function store(Request $request)
    {
        //
    }
}
