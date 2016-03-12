<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;
use Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('form.LoginForm');
    }

    public function doLogin(Request $request)
    {
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
                return view('beranda');
            }
            else{
                return view('form.LoginForm');
            }
        }
    }

    public function doLogout(){
        Auth::logout();
        return view('form.LoginForm');
    }
}
