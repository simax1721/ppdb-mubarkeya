<?php

namespace App\Http\Controllers;

use App\Models\Formulir_user;
use App\Models\Lulus_user;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function get_index() {
        return view('welcome');
    }

    function get_informasi() {
        return view('informasi');
    }
    
    function get_alur() {
        return view('alur');
    }

    function get_lulus($formulir_id) {

        $siswa = Lulus_user::findOrFail($formulir_id);
        return view('siswa.pengumuman.lulus', compact('siswa'));
    }
    
    function get_tidaklulus($formulir_id) {

        $siswa = Formulir_user::findOrFail($formulir_id);
        return view('siswa.pengumuman.tidaklulus', compact('siswa'));
    }
}
