<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Hash;
use Input;
use Validator;

class UserController extends Controller{
    public function index(){

    }

    public function create(){
        return view('form.DosenForm');
    }

    public function store(){
        $rules = array(
            'nama' => 'required',
            'NIP' => 'required',
            'username' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return view('form.DosenForm')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        }
        else{
            $user = new User(Input::all());
            // $user->nama = Input::get('nama');
            // $user->NIP = Input::get('NIP');
            // $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->role_id = 1;
            $user->save();
            return redirect('/tambahdosen');
        }

    }
}
