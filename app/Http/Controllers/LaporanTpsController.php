<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laporantps;

class LaporanTpsController extends Controller
{
    public function laporantps()
 {
  	$data_laporantps = \App\Laporantps::all();
  	return view('admin.laporantps.index', compact('data_laporantps'));
 }
}
