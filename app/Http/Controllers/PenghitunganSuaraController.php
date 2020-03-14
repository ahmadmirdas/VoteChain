<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PerhitunganSuara;

class PenghitunganSuaraController extends Controller
{
    public function penghitungansuara()
    {
        $data_suara = \App\PerhitunganSuara::all();
        $tps = \App\Tps::all();
        return view('admin.suara.index', compact('data_suara', 'tps'));
    }

    public function show($id)
    {
        // $suara = \App\Tps::find($id);
        // $tpsId = \App\PerhitunganSuara::where('tps_id', $id)->first()->id;
        $kandidat = \App\Kandidat::all();

        $tps = \App\Tps::all();

        return view('admin.suara.show', compact('kandidat', 'id', 'tps'));
    }
}
