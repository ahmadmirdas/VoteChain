<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Totalsuara;

class TotalSuaraController extends Controller
{
    public function tampil()
    {
        $kandidat = \App\Kandidat::all();
        $data = [];
        foreach ($kandidat as $item) {
            $dataPemilih = DB::table('perhitungan_suara')
                ->select('kandidat_id', DB::raw('count(kandidat_id) as total_suara'))
                ->groupBy('kandidat_id')
                ->where('kandidat_id', $item->id)
                ->count();
            $data[] = [
                'kandidat_id' => $item->id,
                'namakandidat' => $item->namakandidat,
                'total_suara' => $dataPemilih
            ];
        }

        // var_dump($data);
        // die();
        // dd($data);
        return view('admin.totalsuara.show', compact('data'));
    }
}
