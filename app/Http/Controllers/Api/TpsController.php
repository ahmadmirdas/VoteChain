<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tps;
use App\Kandidat;

class TpsController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                'tps' => Tps::all(),
                'candidates' => Kandidat::all()
            ],
        ]);
    }
}
