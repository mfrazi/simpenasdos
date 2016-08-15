<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;
use Validator;

class AuthController extends Controller {
    public function showLogin() {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('form.LoginForm');
    }

    public function doLogin(Request $request) {
        if (Auth::check()) {
            return redirect('/');
        }
        
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return view('form.LoginForm')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        }
        
        $userdata = array(
            'username'  => $request->input('username'),
            'password'  => $request->input('password')
        );
        if(Auth::attempt($userdata)){
            $role = Auth::user()->role_id;
            if($role==1)
                return redirect()->route('berandadosen');
            else if($role==3)
                return redirect()->route('berandakaprodi');
            else if($role==2)
                return redirect()->route('berandaadmin');
        }
        return view('form.LoginForm')
            ->withErrors(['Username atau Password yang dimasukkan salah']);
    }

    public function doLogout() {
        Auth::logout();
        return redirect('/login');
    }
}
