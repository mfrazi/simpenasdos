<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Announcement;

use Auth;
use Input;
use Session;

class PengumumanController extends Controller {
    public function index() {
        $announs = Announcement::all();
        $exts = array('png','jpg', 'jpeg', 'pdf', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'zip', 'rar');
        $path = [];
        foreach ($announs as $announ) {
            $path[$announ->id] = [];
            $tmp = [];
            if($announ->jumlah_file > 0){
                for ($i = 1; $i <= $announ->jumlah_file; $i++) {
                    foreach($exts as $ext) {
                        if(file_exists(public_path().'/filepengumuman/'.$announ->id.'pengumuman'.$i.'.'.$ext)){
                            array_push($tmp, 'filepengumuman/'.$announ->id.'pengumuman'.$i.'.'.$ext);
                        }
                    }
                }
            }
            array_push($path[$announ->id], $tmp);
        }
        return view('index.PengumumanIndex', ['announs' => $announs, 'path' => $path]);
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

        if($files[0] != NULL){
            $destination_path = public_path().'/filepengumuman';
            $count = 1;
            foreach ($files as $file){
                $file_name = $announ->id.'pengumuman'.(string)$count.'.'.$file->getClientOriginalExtension();
                $file->move($destination_path, $file_name);
                echo $file_name;
                $count = $count+1;
            }
            $announ->jumlah_file = $count-1;
            $announ->save();
        }

        Session::flash('success', 'Pengumuman berhasil dibuat');
        return redirect()->route('pengumuman.create');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = Announcement::find($id);
        return view('form.PengumumanForm', ['data' => $data]);
    }

    public function update($id)
    {
        $pengumuman = Input::all();
        $files = Input::file('file');

        $announ = Announcement::find($id);
        $announ->title = $pengumuman['title'];
        $announ->content = $pengumuman['content'];
        $announ->user_id = Auth::user()->id;
        $announ->save();

        if($files[0] != NULL){
            $destination_path = public_path().'/filepengumuman';
            $count = $announ->total_file+1;
            foreach ($files as $file){
                $file_name = $announ->id.'pengumuman'.(string)$count.'.'.$file->getClientOriginalExtension();
                $file->move($destination_path, $file_name);
                echo $file_name;
                $count = $count+1;
            }
            $announ->jumlah_file = $count-1;
            $announ->save();
        }

        Session::flash('success', 'Pengumuman berhasil dibuat');
        return redirect()->route('pengumuman.create');
    }

    public function destroy($id)
    {
        $announ = Announcement::find($id);
        $announ->delete();
        return redirect()->back();
    }
}
