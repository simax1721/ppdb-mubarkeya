<?php

namespace App\Http\Controllers;

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
}
