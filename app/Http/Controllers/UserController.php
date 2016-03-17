<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Auth;
use Hash;
use Input;
use Session;
use Validator;

class UserController extends Controller{
    public function index(){
        $users = User::where('role_id', '=', 1)
                ->select('id', 'name', 'NIP', 'username')
                ->get();
        return view('index.dosen', ['users' => $users]);
    }

    public function create(){
        return view('form.DosenForm');
    }

    public function store(){
        $rules = array(
            'name' => 'required',
            'NIP' => 'required',
            'username' => 'required',
            'password' => 'required',
            'repassword' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return view('form.DosenForm')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        }
        else{
            $check_username = User::where('username', '=', Input::get('username'))->first();
            if($check_username){
                Session::flash('fail', 'Username sudah digunakan');
                return redirect()->route('dosen.create');
            }
            else{
                $user = new User(Input::all());
                $user->password = Hash::make(Input::get('password'));
                $user->role_id = 1;
                $user->save();
                Session::flash('success', 'Data dosen berhasil ditambahkan');
                return redirect()->route('dosen.create');
            }
        }
    }

    public function edit($id){
        $user = User::where('id', '=', $id)->first();
        return view('form.DosenEditForm', ['user' => $user]);
    }

    public function update($id){
        $rules = array(
            'name' => 'required',
            'NIP' => 'required',
            'username' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return view('form.DosenForm')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        }
        else{
            $check_username = User::where('username', '=', Input::get('username'))->first();
            if($check_username && $check_username->id!=$id){
                Session::flash('fail', 'Username sudah digunakan');
                return redirect()->route('dosen.edit', ['dosen' => $id]);
            }
            else{
                $user = User::find($id);
                $password = Input::get('password');
                $user->name = Input::get('name');
                $user->NIP = Input::get('NIP');
                $user->username = Input::get('username');
                if($password){
                    $user->password = Hash::make($password);
                    Session::flash('password', 'Password berhasil diubah');
                }
                $user->save();
                Session::flash('success', 'Data dosen berhasil diubah');
                return redirect()->route('dosen.edit', ['dosen' => $id]);
            }
        }
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'Data dosen berhasil dihapus');
        return redirect()->route('dosen.index');
    }
}
