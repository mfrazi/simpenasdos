<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting;

use Auth;

class BerandaController extends Controller
{
    public function umum(){
        if(Auth::check()){
            $name = Auth::user()->name;
            view()->share('name', $name);
            $role = Auth::user()->role_id;
            $role = Role::find($role)->type;
            if($role == 'dosen')
                return redirect()->route('berandadosen', ['role' => 'dosen']);
            else if($role == 'kaprodi')
                return redirect()->route('berandadosen', ['role' => 'kaprodi']);
            elseif($role == 'admin')
                return redirect()->route('berandaadmin');
        }
        else{
            $announcements = Announcement::orderBy('created_at', 'desc')->limit(5)->get();
            $path = [];
            foreach ($announcements as $announcement) {
                $path[$announcement->id] = [];
                if($announcement->total_file > 0){
                    $files = glob(public_path().'/filepengumuman/'.$announcement->id.'pengumuman*');
                    foreach($files as $file){
                        if(file_exists($file)){
                            $file_name = explode("/filepengumuman/", $file);
                            array_push($path[$announcement->id], $file_name[1]);
                        }
                    }
                }
            }

            $pengumuman = Setting::find(1)->status_pengumuman;
            return view('beranda.berandaUmum', ['pengumuman' => $pengumuman, 'navbar' => 0, 'announcements' => $announcements, 'path' => $path]);
        }
    }

    public function admin(){
        return view('beranda.berandaAdmin', ['navbar' => 0]);
    }

    public function dosen(){
        return view('beranda.berandaDosen', ['navbar' => 0, 'role' => 'dosen']);
    }

    public function kaprodi(){
        return view('beranda.berandaDosen', ['navbar' => 0, 'role' => 'kaprodi']);
    }
}
