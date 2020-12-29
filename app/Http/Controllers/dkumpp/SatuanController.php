<?php

namespace App\Http\Controllers\dkumpp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pegawai;
use App\Satuan;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.dkumpp.satuan', compact('satuan','instansi'));
    }

    public function simpan(Request $r)
    {
        $satuan = Satuan::create($r->all());
        return redirect()->route('satuan')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $satuan = Satuan::findOrFail($r->id);
        $satuan->update($r->all());
        return redirect()->route('satuan')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $satuan = Satuan::findOrFail($r->id);
        $satuan->delete();
        return redirect()->route('satuan')->with('hapus','Data Berhasil di Hapus');
    }
}
