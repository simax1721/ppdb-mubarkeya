<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formulir_user;
use App\Models\Lulus_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function dashboard() {

        $thn = 'SPMB' . date('Y');

        // dd($thn);

        $pendaftar = Formulir_user::where('id', 'LIKE', $thn."%")->count();
        $lulus = Lulus_user::where('id', 'LIKE', $thn."%")->count();
        $daftarulang = Lulus_user::where('id', 'LIKE', $thn."%")->where('is_daftar_ulang', '!=', null)->count();

        // dd($pendaftar, $lulus, $daftarulang);

        return view('admin.dashboard', compact('pendaftar', 'lulus', 'daftarulang'));
    }
}
