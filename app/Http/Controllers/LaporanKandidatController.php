<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laporankandidat;

class LaporanKandidatController extends Controller
{
    public function laporankandidat()
 {
  	$data_laporankandidat = \App\Laporankandidat::all();
  	return view('admin.laporankandidat.index', compact('data_laporankandidat'));
 }
}
