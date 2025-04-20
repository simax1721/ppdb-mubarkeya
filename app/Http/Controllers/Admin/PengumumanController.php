<?php

namespace App\Http\Controllers\Admin;

// use App\Helpers\Wablas;
use App\Http\Controllers\Controller;
use App\Mail\PengumumanlulusEmail;
use App\Models\Lulus_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PengumumanController extends Controller
{

    function index() {
        $siswa = Lulus_user::where('id','PPDB20250002')->get()->first();

    
    }


    public function kirim() {
        $siswa = Lulus_user::where('id','PPDB20250002')->get()->first();
        Mail::to($siswa->user->email)->send(new PengumumanlulusEmail($siswa));
        return response()->json(['message' => 'Email berhasil dikirim']);
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
