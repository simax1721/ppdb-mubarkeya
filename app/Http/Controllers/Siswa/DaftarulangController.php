<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Daftarulang_user;
use App\Models\Lulus_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class DaftarulangController extends Controller
{
    function index() {
        return view('siswa.daftar-ulang');
    }

    function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'pasphoto' => $request->pasphoto == null ? '' :'mimes:jpg,png|max:1024',
            'kartu_kip' => $request->kartu_kip == null ? '' :'mimes:pdf|max:1024',
            'akte' => $request->akte == null ? '' :'mimes:pdf|max:1024',
            'kk' => $request->kk == null ? '' :'mimes:pdf|max:1024',
            'skl' => $request->skl == null ? '' :'mimes:pdf|max:1024',
            'kartu_nisn' => $request->kartu_nisn == null ? '' :'mimes:pdf|max:1024',
            'nilairapot' => $request->nilairapot == null ? '' :'mimes:pdf|max:1024',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        
        // $linkpasphoto = '/2025/jurusan/nama/berkas.pdf';                     // format simpan file
        $lulus_user = Lulus_user::where('users_id', Auth::user()->id)->first();

        $daftarulang_user = Daftarulang_user::where('users_id', Auth::user()->id)->first();

        
        // dd($link);
        
        if ($request->pasphoto != null) {
            $pasphoto_upload = 'pasphoto.' . $request->pasphoto->getClientOriginalExtension();
            $request->pasphoto->move(public_path() . '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/', $pasphoto_upload);
            
            $link = '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/' . $pasphoto_upload;
            $daftarulang_user->update([
                'pasphoto' => $link
            ]);
            
        }
        
        if ($request->kartu_kip != null) {
            $kartu_kip_upload = 'kartu_kip.' . $request->kartu_kip->getClientOriginalExtension();
            $request->kartu_kip->move(public_path() . '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/', $kartu_kip_upload);
            
            $link = '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/' . $kartu_kip_upload;
            $daftarulang_user->update([
                'kartu_kip' => $link
            ]);
            
        }

        if ($request->akte != null) {
            $akte_upload = 'akte.' . $request->akte->getClientOriginalExtension();
            $request->akte->move(public_path() . '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/', $akte_upload);
            
            $link = '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/' . $akte_upload;
            $daftarulang_user->update([
                'akte' => $link
            ]);
            
        }
        
        if ($request->kk != null) {
            $kk_upload = 'kk.' . $request->kk->getClientOriginalExtension();
            $request->kk->move(public_path() . '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/', $kk_upload);
            
            $link = '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/' . $kk_upload;
            $daftarulang_user->update([
                'kk' => $link
            ]);
            
        }

        if ($request->skl != null) {
            $skl_upload = 'skl.' . $request->skl->getClientOriginalExtension();
            $request->skl->move(public_path() . '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/', $skl_upload);
            
            $link = '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/' . $skl_upload;
            $daftarulang_user->update([
                'skl' => $link
            ]);
            
        }

        if ($request->kartu_nisn != null) {
            $kartu_nisn_upload = 'kartu_nisn.' . $request->kartu_nisn->getClientOriginalExtension();
            $request->kartu_nisn->move(public_path() . '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/', $kartu_nisn_upload);
            
            $link = '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/' . $kartu_nisn_upload;
            $daftarulang_user->update([
                'kartu_nisn' => $link
            ]);
            
        }
        
        if ($request->nilairapot != null) {
            $nilairapot_upload = 'nilairapot.' . $request->nilairapot->getClientOriginalExtension();
            $request->nilairapot->move(public_path() . '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/', $nilairapot_upload);
            
            $link = '/' . date('Y') . '/'. $lulus_user->jurusan->name . '/' .Auth::user()->name .'/' . $nilairapot_upload;
            $daftarulang_user->update([
                'nilairapot' => $link
            ]);
            
        }

        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Daftar Ulang',
            'text' => 'Berkas Diupload!',
            'data'    => ''
        ]);

        // return response()->json([
        //     'data' => $request->all()
        // ]);
    }

    function daftarulangUsers(){
        $user = Daftarulang_user::where('users_id', Auth::user()->id)->first();
        return response()->json([
            'data' => $user,
        ]);
    }
}
