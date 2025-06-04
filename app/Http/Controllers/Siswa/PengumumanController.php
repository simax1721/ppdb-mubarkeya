<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Lulus_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    function index() {

        $cekstatus = Lulus_user::where('users_id', Auth::user()->id)->first();

        if ($cekstatus != null) {
            $cekstatus = 'lulus';
        } else {
            $cekstatus = 'Tidak Lulus';
        }

        // dd($cekstatus);

        return view('siswa.pengumuman.pengumuman', compact('cekstatus'));
    }
}
