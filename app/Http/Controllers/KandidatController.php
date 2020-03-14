<?php

namespace App\Http\Controllers;

use App\Kandidat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    public function kandidat()
    {
        $data_kandidat = \App\Kandidat::all();
        return view('admin.kandidat.index', compact('data_kandidat'));
    }
    public function buat(Request $request)
    {
        $gambar = Storage::disk('public')->put('gambars', $request->file('image'));
        $kandidat = \App\Kandidat::create([
            'namakandidat' => $request->namakandidat,
            'image' => $gambar,
            'status' => $request->status
        ]);

        return redirect('/admin/kandidat')->with('sukses', 'data kandidat berhasil ditambah');
    }

    public function edit($id)
    {
        $kandidat = \App\Kandidat::find($id);
        return view('admin.kandidat.edit', compact('kandidat'));
    }

    public function update(Request $request, $id)
    {
        $gambar = Storage::disk('public')->put('gambars', $request->file('image'));
        $kandidat = \App\Kandidat::find($id);

        $kandidat->namakandidat = $request->namakandidat;
        $kandidat->image = $gambar;
        $kandidat->status = $request->status = false;
        $kandidat->save();

        return redirect('/admin/kandidat')->with('sukses', 'data kandidat berhasil di update');
    }

    public function delete($id)
    {
        $kandidat = \App\Kandidat::find($id);
        $kandidat->delete();
        return redirect('/admin/kandidat')->with('sukses', 'data berhasil di hapus');
    }
}
