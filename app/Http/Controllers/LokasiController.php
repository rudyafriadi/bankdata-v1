<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kecamatan;
use App\Pegawai;
use App\Kelurahan;
use App\Lokasi;

class LokasiController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $lokasi = Lokasi::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.lokasi', compact('kecamatan','instansi','kelurahan','lokasi'));
    }

    public function simpan(Request $r)
    {
        $lokasi = Lokasi::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('lokasi')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $lokasi = Lokasi::findOrFail($r->id);
        $lokasi->update($r->all());
        return redirect()->route('lokasi')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $lokasi = Lokasi::findOrFail($r->id);
        $lokasi->delete();
        return redirect()->route('lokasi')->with('hapus','Data Berhasil di Hapus');
    }
}
