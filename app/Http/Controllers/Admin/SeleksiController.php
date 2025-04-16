<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formulir_user;
use App\Models\Jurusan;
use App\Models\Lulus_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SeleksiController extends Controller
{
    function index() {
        $jurusans = Jurusan::all();
        return view('admin.seleksi.p1', compact('jurusans'));
    }
    
    function get_2() {
        $jurusans = Jurusan::all();
        return view('admin.seleksi.p2', compact('jurusans'));
    }
    
    function get_3() {
        $jurusans = Jurusan::all();
        return view('admin.seleksi.p3', compact('jurusans'));
    }


    function datatable(Request $request) {

        $id_jurusan = $request->id_jurusan;
        $pilihan = $request->pilihan;

        $lulusTotal = Lulus_user::where('jurusans_id', $id_jurusan)->count();

        if ($pilihan == '1') {
            $data = Formulir_user::with('user')->orderBy('nilai', 'desc')->where('jurusan'.$pilihan, $id_jurusan)->where('status_jurusan'.$pilihan, '=', null)->get();
        }

        if ($pilihan == '2') {
            $data = Formulir_user::with('user')->orderBy('nilai', 'desc')->where('jurusan'.$pilihan, $id_jurusan)->where('status_jurusan1', '=', 'T')->where('status_jurusan'.$pilihan, '=', null)->get();
        }
        
        if ($pilihan == '3') {
            $data = '';
        }


        return response()->json([
            'success' => true,
            'title' => 'Formulir',
            'data'    => $data,
            'lulusTotal'    => $lulusTotal,

        ]);
    }

    function approve(Request $request) {
        $id_jur = $request->id_jur;
        $id_formulir = $request->id_formulir;
        $pilihan = $request->pilihan;

        $jurusan = Jurusan::find($id_jur);
        $lulusTotal = Lulus_user::where('jurusans_id', $id_jur)->count();
        // $lulusTotal = 1;
        
        // proses untuk kuota sudah lebih
        if ($lulusTotal >= $jurusan->total) {
            return response()->json([
                'text' => 'Kuota sudah penuh!',
            ], 422);
        }

        if ($pilihan < 3) {
            $formulir = Formulir_user::find($id_formulir);
            Lulus_user::create([
                'id' => $formulir->id,
                'users_id' => $formulir->users_id,
                'biodata_users_id' => $formulir->biodata_users_id,
                'jurusans_id' => $id_jur,
            ]);
    
            $formulir->update([
                'status_jurusan'.$pilihan => 'L',
            ]);
            $formulir->save();
        } else {

            // $validator = Validator::make($request->all(), [
            //     'jurusan' => 'required',
            // ]);
    
            // //check if validation fails
            // if ($validator->fails()) {
            //     return response()->json($validator->errors(), 422);
            // }

            $formulir = Formulir_user::find($id_formulir);
            Lulus_user::create([
                'id' => $formulir->id,
                'users_id' => $formulir->users_id,
                'biodata_users_id' => $formulir->biodata_users_id,
                'jurusans_id' => $id_jur,
            ]);
    
            $formulir->update([
                'status_jurusan1' => 'A',
                'status_jurusan2' => 'A',
            ]);
            $formulir->save();
            
        }
        
        

        return response()->json([
            'success' => true,
            'title' => 'Seleksi',
            'text' => 'Lulus!'
        ]);

        // return $lulusTotal;

    }
    
    function reject(Request $request) {
        $id_jur = $request->id_jur;
        $id_formulir = $request->id_formulir;
        $pilihan = $request->pilihan;
        
        $formulir = Formulir_user::find($id_formulir);

        $formulir->update([
            'status_jurusan'.$pilihan => 'T',
        ]);
        $formulir->save();

        return response()->json([
            'success' => true,
            'title' => 'Seleksi',
            'text' => 'Tidak Lulus!'
        ]);

        // return $lulusTotal;

    }

    function datatableTidakLulus(Request $request) {
        $data = Formulir_user::with('user')->orderBy('nilai', 'desc')->where('status_jurusan1', '=', 'T')->where('status_jurusan2', '=', 'T')->get();
        
        // return response()->json($data);
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('no_pendaftaran', function ($data) {
                    return $data->id;
                })
                ->addColumn('nilai', function ($data) {
                    return $data->nilai;
                })
                ->addColumn('jurusan1', function ($data) {
                    return $data->pilihan1->name;
                })
                ->addColumn('jurusan2', function ($data) {
                    return $data->pilihan2->name;
                })
                ->addColumn('action', function ($data) {
                    // return $data->a;
                    return '<div style="display: inline-flex;" class="">
                            <a href="javascript:void(0)" id="btn-edit" data-id="' . $data->id . '" class="btn btn-sm btn-info mr-2">Pilih Jurusan</a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
