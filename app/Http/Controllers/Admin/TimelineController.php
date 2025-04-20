<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TimelineController extends Controller
{
    function index() {
        return view('admin.timeline');
    }

    function get_show(Timeline $role)
    {
        return response()->json([
            'success' => true,
            'title' => 'Timeline',
            'data'    => $role
        ]);
    }

    function post_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Timeline::find($id)->update([
            'name' => $request->name,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'icon' => 'success',
            'title' => 'Timeline',
            'text' => 'Data Berhasil Diubah!',
            'data'    => ''
        ]);
    }

    function get_datatable(Request $request)
    {

        $data = Timeline::get();

        // return response()->json($data);
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('no', function ($data) {
                    return $data->id;
                })
                ->addColumn('tgl_mulai', function ($data) {
                    return date('d/m/Y', strtotime($data->tgl_mulai));
                })
                ->addColumn('tgl_selesai', function ($data) {
                    return date('d/m/Y', strtotime($data->tgl_selesai));;
                })
                ->addColumn('action', function ($data) {
                    // return $data->a;
                    return '<div style="display: inline-flex;" class="">
                                <a href="javascript:void(0)" id="btn-edit" data-id="' . $data->id . '" class="btn btn-sm btn-info mr-2">Edit</a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
