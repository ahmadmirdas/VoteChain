<?php

namespace App\Http\Controllers;

use PDF;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Totalsuara;

class BeritaAcaraController extends Controller
{

	public function data() 
	{

	}
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
 				$data[]=[
 					'kandidat_id' => $item->id,
 					'namakandidat' => $item->namakandidat,
 					'total_suara' => $dataPemilih
 				];
  		}

  		return view('admin.beritaacara.index', compact('data'));
 	}

 	public function export()
 	{
 		$kandidat = \App\Kandidat::all();
  		$data = [];

  		foreach ($kandidat as $item) {
  			$dataPemilih = DB::table('perhitungan_suara')
 				->select('kandidat_id', DB::raw('count(kandidat_id) as total_suara'))
 				->groupBy('kandidat_id')
 				->where('kandidat_id', $item->id)
 				->count();
 				$data[]=[
 					'kandidat_id' => $item->id,
 					'namakandidat' => $item->namakandidat,
 					'total_suara' => $dataPemilih
 				];
  		}

  		$pdf = PDF::loadView('admin.beritaacara.export', compact('data'))->setPaper('A4', 'portrait');

  		return $pdf->stream('admin.beritaacara.export', 'data');

  		// return view('admin.beritaacara.export', compact('data'));
 	}
}
