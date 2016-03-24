<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Classroom;

use Input;
use Validator;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $classrooms = Classroom::select('id', 'name')->get();
        //return $classroom;
        return view('form.PendaftarForm', ['classrooms' => $classrooms]);
    }

    public function store(Request $request)
    {
        $rules = [
            'transkrip' => 'required|mimes:c,cpp'
        ];

        //$data = Input::all();
        $transkrip = Input::file('transkrip');
        $file_name = $transkrip->getClientOriginalName();

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return $this->errors(['message'=>'salah']);
        }
        $destination_path = storage_path().'/transkrip';
        if(!$transkrip->move($destination_path, $file_name)){
            return $this->errors(['message'=>'salah2']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
