<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class BerandaController extends Controller
{
    public function umum(){
        if(Auth::check()){
            $name = Auth::user()->name;
            view()->share('name', $name);
            $role = Auth::user()->role_id;
            if($role==1)
                return redirect()->route('dosenadmin');
            elseif($role==2)
                return redirect()->route('berandaadmin');
        }
        else{
            return view('beranda.berandaUmum');
        }
    }

    public function admin(){
        return view('beranda.berandaAdmin');
    }

    public function dosen(){
        return view('beranda.berandaDosen');
    }
}
