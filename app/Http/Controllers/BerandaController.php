<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting;

use Auth;

class BerandaController extends Controller
{
    public function umum(){
        if(Auth::check()){
            $name = Auth::user()->name;
            view()->share('name', $name);
            $role = Auth::user()->role_id;
            if($role==1 || $role==3)
                return redirect()->route('berandadosen');
            elseif($role==2)
                return redirect()->route('berandaadmin');
        }
        else{
            $pengumuman = Setting::find(1)->status_pengumuman;
            return view('beranda.berandaUmum', ['pengumuman' => $pengumuman]);
        }
    }

    public function admin(){
        return view('beranda.berandaAdmin');
    }

    public function dosen(){
        return view('beranda.berandaDosen');
    }

    public function kaprodi(){
        return view('beranda.berandaKaprodi');
    }
}
