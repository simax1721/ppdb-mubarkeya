<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    function index() {
        return view('siswa.pengumuman.pengumuman');
    }
}
