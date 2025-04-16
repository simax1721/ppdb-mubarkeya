<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formulir_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class NilaiController extends Controller
{
    function index() {
        return view('admin.nilai');
    }

    function show($id) {

        $formulir_user = Formulir_user::with('user')->find($id);
        return response()->json([
            'success' => true,
            'title' => 'Jurusan',
            'data'    => $formulir_user
        ]);
    }

    function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nilai' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Formulir_user::find($id)->update([
            'nilai' => $request->nilai,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Penilaian',
            'text' => 'Nilai Ditambahkan!',
            'data'    => ''
        ]);
    }



    function get_datatable(Request $request)
    {

        $data = Formulir_user::get();

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
                            <a href="javascript:void(0)" id="btn-edit" data-id="' . $data->id . '" class="btn btn-sm btn-info mr-2">Nilai</a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
