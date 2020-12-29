<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Golongan;
use App\Pegawai;

class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.golongan', compact('golongan','instansi'));
    }

    public function simpan(Request $r)
    {
        $golongan = Golongan::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('golongan')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $golongan = Golongan::findOrFail($r->id);
        $golongan->update($r->all());
        return redirect()->route('golongan')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $golongan = Golongan::findOrFail($r->id);
        $golongan->delete();
        return redirect()->route('golongan')->with('hapus','Data Berhasil di Hapus');
    }
}
