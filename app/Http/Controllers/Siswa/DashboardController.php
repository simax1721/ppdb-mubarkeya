<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Biodata_user;
use App\Models\Formulir_user;
use App\Models\Lulus_user;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboard() {
        return view('dashboard');
    }

    function dashboardTimeline(Request $request) {
        $timeline1 = Biodata_user::where('users_id', Auth::user()->id)->count();
        $timeline2 = Formulir_user::where('users_id', Auth::user()->id)->count();
        
        $timeline3 = Formulir_user::where('users_id', Auth::user()->id)->where('nalquran', '!=', null)->where('nakademik', '!=', null)->where('nmikat', '!=', null)->where('nkejuruan', '!=', null)->count();

        $timeline4 = Lulus_user::where('users_id', Auth::user()->id)->count();
        $timeline5 = Lulus_user::where('users_id', Auth::user()->id)->where('is_daftar_ulang', '!=', null)->count();

        $timelineStatus = [
            'timeline1' => $timeline1,
            'timeline2' => $timeline2,
            'timeline3' => $timeline3,
            'timeline4' => $timeline4,
            'timeline5' => $timeline5,
        ];

        $timelineWaktu = Timeline::all();

        $ceklulus = Lulus_user::where('users_id', Auth::user()->id)->count();

        return response()->json([
            'timelineStatus' => $timelineStatus,
            'timelineWaktu' => $timelineWaktu,
            'ceklulus' => $ceklulus,
        ]);
    }
}
