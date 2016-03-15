<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function admin(){
        return view('beranda.berandaAdmin');
    }

    public function dosen(){
        return view('beranda.berandaDosen');
    }
}
