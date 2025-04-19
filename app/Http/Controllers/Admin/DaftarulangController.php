<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Lulus_user;
use Illuminate\Http\Request;

class DaftarulangController extends Controller
{
    function index() {
        $jurusans = Jurusan::all();
        return view('admin.daftar-ulang', compact('jurusans'));
    }

    function datatable(Request $request) {
        $id_jurusan = $request->id_jurusan;
        $pilihan = $request->pilihan;

        $lulusTotal = Lulus_user::where('jurusans_id', $id_jurusan)->count();
        $daftar_ulang = Lulus_user::where('jurusans_id', $id_jurusan)->where('is_daftar_ulang', '!=', null)->count();

        $data = Lulus_user::with('user')->orderBy('is_daftar_ulang', 'desc')->where('jurusans_id', $id_jurusan)->get();
        


        return response()->json([
            'success' => true,
            'title' => 'Daftar Ulang',
            'data'    => $data,
            'lulusTotal'    => $lulusTotal,
            'daftar_ulang'    => $daftar_ulang,

        ]);
    }

    function approve(Request $request) {
        $id_jur = $request->id_jur;
        $id_formulir = $request->id_formulir;
        $pilihan = $request->pilihan;

        $formulir = Lulus_user::find($id_formulir);
        $formulir->update([
            'is_daftar_ulang' => 'Y',
        ]);
        

        return response()->json([
            'success' => true,
            'title' => 'Daftar Ulang',
            'text' => 'Terverifikasi!'
        ]);

        // return $lulusTotal;

    }
    
    function reject(Request $request) {
        $id_jur = $request->id_jur;
        $id_formulir = $request->id_formulir;
        $pilihan = $request->pilihan;

        $formulir = Lulus_user::find($id_formulir);
        $formulir->update([
            'is_daftar_ulang' => null,
        ]);
        

        return response()->json([
            'success' => true,
            'title' => 'Daftar Ulang',
            'text' => 'Tidak terverifikasi!'
        ]);

        // return $lulusTotal;

    }
}
