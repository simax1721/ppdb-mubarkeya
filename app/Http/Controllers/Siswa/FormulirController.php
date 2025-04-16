<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Biodata_user;
use App\Models\Formulir_user;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormulirController extends Controller
{
    function index() {
        $jurusans = Jurusan::all();
        return view('siswa.formulir.formulir', compact('jurusans'));
    }

    function print() {
        return view('siswa.formulir.print');
    }

    function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'jurusan1' => 'required',
            'jurusan2' => 'required',
        ]);
        
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $formulir_users = Formulir_user::where('users_id', $request->users_id)->get();
        // return $formulir_users;
        
        if (count($formulir_users) > 0) {
            $formulir = $formulir_users->first();
            Formulir_user::find($formulir->id)->update([
                'jurusan1' => $request->jurusan1,
                'jurusan2' => $request->jurusan2,
            ]);
        } else {

            $id_part1 = 'PPDB' . date('Y');
            // $id_part1 = 'PPDB2026';
            $id_ceknomor = Formulir_user::where('id', 'LIKE', $id_part1 . "%")->orderBy('nomor', 'desc')->get();
            if (count($id_ceknomor) > 0) {
                if ($id_ceknomor->first()->nomor < 10) {
                    $id_part2 = '000' . ($id_ceknomor->first()->nomor + 1);
                } elseif ($id_ceknomor->first()->nomor < 100) {
                    $id_part2 = '00' . ($id_ceknomor->first()->nomor + 1);
                } elseif ($id_ceknomor->first()->nomor < 1000) {
                    $id_part2 = '0' . ($id_ceknomor->first()->nomor + 1);
                } elseif ($id_ceknomor->first()->nomor < 1000) {
                    $id_part2 = ($id_ceknomor->first()->nomor + 1);
                }
            } else {
                $id_part2 = '000' . 1;
            }

            Formulir_user::create([
                'id' => $id_part1.$id_part2,
                'nomor' => $id_part2,
                'users_id' => $request->users_id,
                'biodata_users_id' => $request->biodata_users_id,
                'jurusan1' => $request->jurusan1,
                'jurusan2' => $request->jurusan2,
            ]);
        }
        
        //return response
        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Formulir',
            'text' => 'Formulir Berhasil Dibuat!',
            'data'    => ''
        ]);
    }




    function formulirUsers(){
        $user = Formulir_user::with('pilihan1', 'pilihan2')->where('users_id', Auth::user()->id)->first();
        return response()->json([
            'data' => $user,
        ]);
    }
}
