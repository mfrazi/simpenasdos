<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Announcement;

use Auth;
use File;
use Input;
use Response;
use Session;

class PengumumanController extends Controller {
    public function index() {
        $announs = Announcement::all();
        $path = [];
        foreach ($announs as $announ) {
            $path[$announ->id] = [];
            if($announ->total_file > 0){
                $files = glob(public_path().'/filepengumuman/'.$announ->id.'pengumuman*');
                foreach($files as $file){
                    if(file_exists($file)){
                        $file_name = explode("/filepengumuman/", $file);
                        array_push($path[$announ->id], $file_name[1]);
                    }
                }
            }
        }
        return view('index.PengumumanIndex', ['announs' => $announs, 'path' => $path, 'navbar' => 3]);
    }

    public function create() {
        return view('form.PengumumanForm', ['navbar' => 3]);
    }

    public function store() {
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
                $file_name = $announ->id.'pengumumanxasdfmnb'.$file->getClientOriginalName();
                $file->move($destination_path, $file_name);
                echo $file_name;
                $count = $count+1;
            }
            $announ->total_file = $count-1;
            $announ->save();
        }

        Session::flash('success', 'Pengumuman berhasil dibuat');
        return redirect()->route('pengumuman.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = Announcement::find($id);
        $path = [];
        if($data->total_file > 0){
            $files = glob(public_path().'/filepengumuman/'.$id.'pengumuman*');
            foreach($files as $file){
                if(file_exists($file)){
                    $file_name = explode("/filepengumuman/", $file);
                    array_push($path, $file_name[1]);
                }
            }
        }
        return view('form.PengumumanEditForm', ['data' => $data, 'path' => $path, 'navbar' => 3]);
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
                $file_name = $announ->id.'pengumumanxasdfmnb'.$file->getClientOriginalName();
                $file->move($destination_path, $file_name);
                echo $file_name;
                $count = $count+1;
            }
            $announ->total_file = $count-1;
            $announ->save();
        }

        Session::flash('success', 'Pengumuman berhasil diubah');
        return redirect()->route('pengumuman.edit', ['id' => $id]);
    }

    public function destroy($id)
    {
        $announ = Announcement::find($id);
        $announ->delete();
        Session::flash('destroy', 'Pengumuman berhasil dihapus');
        return redirect()->back();
    }

    public function download($name){
        $name = $name;
        $path = public_path().'/filepengumuman/'.$name;
        $name = explode('xasdfmnb', $name);
        $type = File::mimeType($path);
        $headers = ['Content-Type: '.$type];
        return Response::download($path, $name[1], $headers);
    }

    public function sisipan($name)
    {
        $get_id = explode('pengumuman', $name);
        $id = (int)$get_id[0];
        $announ = Announcement::find($id);
        $announ->total_file = ($announ->total_file)-1;
        $announ->save();

        $file_name = public_path().'/filepengumuman/'.$name;
        unlink($file_name);
        Session::flash('destroy', 'File sisipan berhasil dihapus');
        return redirect()->back();
    }
}
