<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class JurusanController extends Controller
{
    function get_index()
    {
        return view('admin.jurusan');
    }

    function post_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'total' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Jurusan::create([
            'name' => $request->name,
            'total' => $request->total,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Jurusan',
            'text' => 'Data Berhasil Disimpan!',
            'data'    => ''
        ]);
    }

    function get_show(Jurusan $role)
    {
        return response()->json([
            'success' => true,
            'title' => 'Jurusan',
            'data'    => $role
        ]);
    }

    function post_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'total' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Jurusan::find($id)->update([
            'name' => $request->name,
            'total' => $request->total,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Jurusan',
            'text' => 'Data Berhasil Diubah!',
            'data'    => ''
        ]);
    }


    function get_datatable(Request $request)
    {

        $data = Jurusan::get();

        // return response()->json($data);
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('jurusan', function ($data) {
                    return $data->name;
                })
                ->addColumn('total', function ($data) {
                    return $data->total;
                })
                ->addColumn('action', function ($data) {
                    // return $data->a;
                    return '<div style="display: inline-flex;" class="">
                            <a href="javascript:void(0)" id="btn-edit" data-id="' . $data->id . '" class="btn btn-sm btn-info mr-2">Edit</a>
                            <a href="javascript:void(0)" id="btn-delete" data-id="' . $data->id . '" class="btn btn-sm btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    function delete_destroy($id)
    {
        Jurusan::destroy($id);

        return response()->json([
            'success' => true,
            'icon' => 'warning',
            'title' => 'Jurusan',
            'text' => 'Data Telah Dihapus!',
            'data'    => ''
        ]);
    }
}
