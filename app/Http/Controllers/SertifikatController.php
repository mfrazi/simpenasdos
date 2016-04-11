<?php

namespace App\Http\Controllers;

use App\Registrant;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Session;

class SertifikatController extends Controller
{
    public function index() {
        return view('form.SertifikatForm');
    }

    public function submitNRP() {
        $data = Input::all();
        $rules = [
            'NRP' => 'required'
        ];
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            Session::flash('fail', 'NRP tidak terisi');
            return redirect()->route('sertifikat.index');
        }
        $assistedClassrooms = Registrant::where('NRP', $data['NRP'])->where('status', true)->with('classroom')->get();
        if (count($assistedClassrooms) == 0) {
            Session::flash('fail', 'Mahasiswa dengan NRP yang dimasukkan tidak terdaftar sebagai asisten');
            return redirect()->route('sertifikat.index');
        }
        return redirect()->route('sertifikat.showConfirmation', $data['NRP']);
    }

    public function showConfirmation($nrp) {
        $assistedClassrooms = Registrant::where('NRP', $nrp)->where('status', true)->with('classroom')->get();
        if (count($assistedClassrooms) == 0) {
            Session::flash('fail', 'Mahasiswa dengan NRP yang dimasukkan tidak terdaftar sebagai asisten');
            return redirect()->route('sertifikat.index');
        }
        return view('form.SertifikatConfirmation', ['assistedClassrooms' => $assistedClassrooms, 'nrp' => $nrp]);
    }

    public function order() {
        $data = Input::all();
        if (!isset($data['NRP'])) {
            Session::flash('fail', 'Gagal memesan sertifikat. Silahkan coba lagi');
            return redirect()->route('sertifikat.index');
        }
        $nrp = $data['NRP'];
        Registrant::where('NRP', $nrp)->where('status', true)->update(['is_order_certificate' => true]);
        Session::flash('success', 'Pemesanan sertifikat berhasil dilakukan');
        return redirect()->route('sertifikat.index');
    }

    public function showOrder() {
        $orderers = Registrant::where('is_order_certificate', true)->with('classroom')->get();
        return view('form.PemesanSertifikatForm', ['orderers'=>$orderers]);
    }

    public function printCertificate($id) {
        $registrant = Registrant::where('id', $id)->get();
        if (count($registrant)>0 && $registrant[0]->status && $registrant[0]->is_order_certificate) {
            Registrant::where('id', $id)->update(['is_certificate_printed' => true]);
        }
        return redirect()->route('sertifikat.showOrder');
    }
}
