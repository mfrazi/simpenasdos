<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Announcement;

use Auth;
use Input;

class PengumumanController extends Controller {
    public function index() {
        $announs = Announcement::all();
        // download file di sini
        //return $announs;
        return view('index.PengumumanIndex', ['announs' => $announs]);
    }

    public function create() {
        return view('form.PengumumanForm');
    }

    public function store(Request $request) {
        $pengumuman = Input::all();
        $files = Input::file('file');

        $announ = new Announcement();
        $announ->title = $pengumuman['title'];
        $announ->content = $pengumuman['content'];
        $announ->user_id = Auth::user()->id;
        $announ->save();

        if(is_null($files)){
            return "ok";
            $destination_path = public_path().'/filepengumuman';
            $count = 1;
            foreach ($files as $file){
                $file_name = $announ->id.'pengumuman'.(string)$count.'.'.$file->getClientOriginalExtension();
                $file->move($destination_path, $file_name);
                echo $file_name;
                $count = $count+1;
            }
        }

        return redirect()->route('pengumuman.create');
    }

    public function show($id)
    {
        //
    }

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
