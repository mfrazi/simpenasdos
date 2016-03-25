<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;
use Validator;

class AuthController extends Controller {
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('form.LoginForm');
    }

    public function doLogin(Request $request) {
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return view('form.LoginForm')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        }
        else{
            $userdata = array(
                'username'  => Input::get('username'),
                'password'  => Input::get('password')
            );
            if(Auth::attempt($userdata)){
                $role = Auth::user()->role_id;
                if($role==1 || $role==3)
                    return redirect()->route('berandadosen');
                else if($role==2)
                    return redirect()->route('berandaadmin');
            }
            else{
                return view('form.LoginForm')
                        ->withErrors(['Username atau Password yang dimasukkan salah'])
                        ->withInput(Input::except('password'));
            }
        }
    }

    public function doLogout(){
        Auth::logout();
        return redirect('/login');
    }
}
