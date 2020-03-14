<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Pemilih;

class PemilihController extends Controller
{
    public function pemilih()
 {
  	$data_pemilih = \App\Pemilih::all();
  	return view('admin.pemilih.index', compact('data_pemilih', 'tps'));
 }

 public function buat(Request $request)
 {
  $pemilih = \App\Pemilih::create([
   'NIK' => $request->NIK,
   'nama' => $request->nama,
   'tps_id' => $request->tps_id,
   'status' => $request->status
  ]);

  return redirect('/admin/pemilih')->with('sukses','data pemilih berhasil ditambah');
 }

 public function edit($id)
 {
  $pemilih = \App\Pemilih::find($id);
  $tps = \App\TPS::all();
  return view('admin.pemilih.edit', compact('pemilih', 'tps'));
 }

 public function update(Request $request,$id)
 {
  $pemilih = \App\Pemilih::find($id);

  $pemilih->NIK = $request->NIK;
  $pemilih->nama = $request->nama;
  $pemilih->tps_id = $request->tps_id;
  $pemilih->status = $request->status;
  $pemilih->save();

  return redirect('/admin/pemilih')->with('sukses','data pemilih berhasil di update');
 }

 public function delete($id)
 {
  $pemilih = \App\Pemilih::find($id);
  $pemilih->delete();
  return redirect('/admin/pemilih')->with('sukses','data berhasil di hapus');
 }
}
