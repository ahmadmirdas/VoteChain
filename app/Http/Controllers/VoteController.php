<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kandidat;

class VoteController extends Controller
{
    public function kandidat()
 {
  	$data_kandidat = \App\Kandidat::all();
  	return view('admin.home.index', compact('data_kandidat'));
 }
}
