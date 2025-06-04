<?php

namespace App\Http\Controllers\Admin;

// use App\Helpers\Wablas;
use App\Http\Controllers\Controller;
use App\Mail\PengumumanlulusEmail;
use App\Mail\PengumumantidaklulusEmail;
use App\Models\Formulir_user;
use App\Models\Lulus_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PengumumanController extends Controller
{

    function index() {
        // $siswa = Lulus_user::where('id','PPDB20250002')->get()->first();

        return view('admin.pengumuman');
    
    }


    public function kirim() {

        $formulir_users = Formulir_user::all();

        foreach ($formulir_users as $fu) {
            $lulus = Lulus_user::find($fu->id);

            if ($lulus != null) {
                // echo $fu->id . ' lulus <br>';
                Mail::to($lulus->user->email)->send(new PengumumanlulusEmail($lulus));
            } else {
                // echo $fu->id . ' Tidak lulus <br>';
                Mail::to(users: $fu->user->email)->send(new PengumumantidaklulusEmail($fu));
            }
        }

        // $siswas = Lulus_user::get();
        // // $siswa = Lulus_user::where('id','PPDB20250002')->get()->first();
        // foreach ($siswas as $siswa) {
        //     Mail::to($siswa->user->email)->send(new PengumumanlulusEmail($siswa));
        // }

        return response()->json(['message' => 'Pengumuman berhasil dikirim!']);
    }

    // public function sendPengumumanLulus($siswa)
    // {
    //     // echo $siswa->user->name;
    //     // Kirim email pengumuman kelulusan
    // }


    // public function kirim()
    // {
    //     $noTujuan = '683835732486';
    //     $pesan = 'Halo, ini pesan dari simax! tes send notif PPDB MUBARKEYA';

    //     $hasil = Wablas::kirimPesan($noTujuan, $pesan);

    //     return response()->json($hasil);
    // }
}
