<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use App\Announcement;
use App\Role;
use App\Registrant;
use App\Semester;
use App\Setting;

use Auth;

class BerandaController extends Controller {
    public function umum() {
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
            $pendaftaran = Setting::find(1)->status_pendaftaran;
            $semester = Setting::find(1)->semester->name;

            return view('beranda.berandaUmum', ['pengumuman' => $pengumuman, 'pendaftaran' => $pendaftaran, 'semester' => $semester, 'navbar' => 0, 'announcements' => $announcements, 'path' => $path]);
        }
    }

    public function pengumuman(){
        $pengumuman = Setting::find(1)->status_pengumuman;
        if(!$pengumuman){
            return abort(404);
        }

        $semester_aktif = Setting::find(1)->semester_id;
        $semester = Semester::find($semester_aktif)->name;
        $assistants = Registrant::where('status', true)
            ->whereHas('classroom', function($query) use($semester_aktif){
                $query->where('semester_id', '=', $semester_aktif);
            })->get();
        return view('beranda.PengumumanAsisten', ['assistants' => $assistants, 'semester' => $semester]);
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
