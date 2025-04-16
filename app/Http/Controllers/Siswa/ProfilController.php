<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Biodata_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    function index() {
        return view('siswa.profil.1');
    }

    function updateakun(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nisn' => 'required',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'photo' => $request->photo == null ? '' :'mimes:jpg,png',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'tmp_lahir' => $request->tmp_lahir,
        ]);

        if ($request->photo != null) {
            $photo_upload = Str::random(100) . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path() . '/uploads/', $photo_upload);

            User::find(Auth::user()->id)->update([
                'photo' => $photo_upload
            ]);
            
        }
        
        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Profil',
            'text' => 'Data Berhasil Disimpan!',
            'data'    => ''
        ]);
        
    }



    function biodata() {
        return view('siswa.profil.2');
    }

    function updatebiodata(Request $request) {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'nama_bapak' => 'required',
            'nomor_bapak' => 'required',
            'nama_ibu' => 'required',
            'nomor_ibu' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Biodata_user::updateOrCreate(
            ['users_id' => Auth::user()->id], // Kriteria pencarian
            [
                // 'user_id' => $request->user_id,
                'nik' => $request->nik,
                'agama' => $request->agama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'asal_sekolah' => $request->asal_sekolah,
                'nama_bapak' => $request->nama_bapak,
                'nomor_bapak' => $request->nomor_bapak,
                'nama_ibu' => $request->nama_ibu,
                'nomor_ibu' => $request->nomor_ibu,
            ]
        );

        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Biodata',
            'text' => 'Data Berhasil Disimpan!',
            'data'    => ''
        ]);
        
    }


    function users() {
        $user = Auth::user();
        return response()->json([
            'data' => $user,
        ]);
    }
    
    function biodataUsers() {
        $user = Biodata_user::where('users_id', Auth::user()->id)->first();
        return response()->json([
            'data' => $user,
        ]);
    }
}
