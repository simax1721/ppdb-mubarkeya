<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daftarulang_user;
use App\Models\Jurusan;
use App\Models\Lulus_user;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

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
        
        
        $data = Lulus_user::with(['user', 'daftarUlang'])->orderBy('is_daftar_ulang', 'desc')->where('jurusans_id', $id_jurusan)->get();
        
        return response()->json([
            'success' => true,
            'title' => 'Daftar Ulang',
            'data'    => $data,
            'lulusTotal'    => $lulusTotal,
            'daftar_ulang'    => $daftar_ulang,
            // 'berkas' => $berkas,

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

    function download($tahun, $jurusan) {
        $folderPath = public_path(date('Y') ."/{$jurusan}");

        if (!file_exists($folderPath)) {
            abort(404, 'Folder tidak ditemukan.');
        }

        $zipFileName = date('Y') . " - {$jurusan}.zip";
        $zipFilePath = public_path("temp_zip/{$zipFileName}");

        // Buat folder temp jika belum ada
        if (!file_exists(public_path('temp_zip'))) {
            mkdir(public_path('temp_zip'), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {

            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($folderPath),
                RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath     = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($folderPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();

            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        }

        abort(500, 'Gagal membuat ZIP.');
    }
}
