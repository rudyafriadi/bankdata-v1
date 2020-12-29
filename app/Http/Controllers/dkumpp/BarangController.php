<?php

namespace App\Http\Controllers\dkumpp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\Pegawai;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.dkumpp.barang', compact('barang','instansi'));
    }

    public function simpan(Request $r)
    {
        $barang = Barang::create($r->all());
        return redirect()->route('barang')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $barang = Barang::findOrFail($r->id);
        $barang->update($r->all());
        return redirect()->route('barang')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $barang = Barang::findOrFail($r->id);
        $barang->delete();
        return redirect()->route('barang')->with('hapus','Data Berhasil di Hapus');
    }
}
