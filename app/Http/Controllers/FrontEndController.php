<?php

namespace App\Http\Controllers;

use Session;
use App\Pemilih;
use App\PerhitunganSuara;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kandidat;
use App\Events\SetStatusTps;

class FrontEndController extends Controller
{
    public function kandidat()
    {
        $data_kandidat = \App\Kandidat::all();
        return view('home.index', compact('data_kandidat'));
    }

    public function coblos1(Request $request)
    {
        $perhitungan = PerhitunganSuara::create($request->all());

        $tps = \App\Tps::where('id', 1);

        $tps->update([
            'status' => FALSE
        ]);
        $tps = \App\Tps::where('id', 1)->first();
        event(new SetStatusTps($tps));
        return redirect()->back();
    }

    public function coblos2(Request $request)
    {
        $perhitungan = PerhitunganSuara::create($request->all());

        $tps = \App\Tps::where('id', 2);

        $tps->update([
            'status' => FALSE
        ]);

        return redirect()->back();
    }

    public function tps(int $id)
    {
        $data_kandidat = \App\Kandidat::all();

        $tps = \App\Tps::findOrFail($id);

        $tpsCountDPT = \App\Tps::where('id', $id)->first();

        return view('home.index', compact('data_kandidat', 'tps', 'tpsCountDPT'));
    }

    public function tps2()
    {
        $data_kandidat = \App\Kandidat::all();

        $tps = \App\Tps::where('id', 2)->get();

        $tpsCountDPT = \App\Tps::where('id', 2)->first();

        $pemilihanCount = PerhitunganSuara::where('tps_id', 2)->get()->count();

        return view('home.index2', compact('data_kandidat', 'tps', 'pemilihanCount', 'tpsCountDPT'));
    }

    public function verify1(Request $request)
    {
        $tps = \App\Tps::where('id', 1);


        $tps->update([
            'status' => $request->status
        ]);
        $tps = \App\Tps::where('id', 1)->first();
        event(new SetStatusTps($tps));


        return redirect()->back();
    }

    public function verify2(Request $request)
    {
        $kandidat = \App\Tps::where('id', 2);

        $kandidat->update([
            'status' => $request->status
        ]);

        $tps = \App\Tps::where('id', 2)->first();
        event(new SetStatusTps($tps));

        return redirect()->back();
    }

    public function checkStatusTps1()
    {

        \App\Tps::where('id', 1)->update([
            'status' => false
        ]);

        $tps = \App\Tps::where('id', 1)->first();

        event(new SetStatusTps($tps));

        return response()->json([
            'data' => $tps,
            'status' => 200
        ]);
    }

    public function checkStatusTpsUpdate(int $id)
    {
        $tps = \App\Tps::where('id', $id);

        $tps->update([
            'status' => FALSE
        ]);

        $tps = \App\Tps::where('id', $id)->first();

        event(new SetStatusTps($tps));

        return response()->json([
            'status' => 200,
            'vote' => 0
        ]);
    }
}
