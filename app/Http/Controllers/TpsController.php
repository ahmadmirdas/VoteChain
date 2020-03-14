<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tps;
use App\Pemilih;

class TpsController extends Controller
{
    public function tps()
    {
        $data_tps = \App\Tps::all();
        return view('admin.tps.index', compact('data_tps'));
    }

    public function control()
    {
        $data_tps = \App\Tps::all();
        return view('admin.controltps.index', compact('data_tps'));
    }

    public function buat(Request $request)
    {
        $tps = \App\Tps::create([
            'namatps' => $request->namatps,
            'jumlahdpt' => $request->jumlahdpt
        ]);

        return redirect('/admin/tps')->with('sukses', 'data tps berhasil ditambah');
    }

    public function edit($id)
    {
        $tps = \App\Tps::find($id);
        return view('admin.tps.edit', compact('tps'));
    }

    public function update(Request $request, $id)
    {
        $tps = \App\Tps::find($id);

        $tps->namatps = $request->namatps;
        $tps->jumlahdpt = $request->jumlahdpt;
        $tps->save();

        return redirect('/admin/tps')->with('sukses', 'data tps berhasil di update');
    }

    public function show($id)
    {
        $pemilih = \App\Tps::find($id);
        $data_pemilih = \App\Pemilih::where('tps_id', $pemilih->id)->get();
        return view('admin.tps.show', compact('pemilih', 'data_pemilih'));
    }

    public function buatpemilih(Request $request)
    {
        $pemilih = \App\Pemilih::create([
            'NBI' => $request->NBI,
            'nama' => $request->nama,
            'tps_id' => $request->tps_id,
            'status' => $request->status
        ]);

        return redirect()->back()->with('sukses', 'data pemilih berhasil ditambah');
    }
}
