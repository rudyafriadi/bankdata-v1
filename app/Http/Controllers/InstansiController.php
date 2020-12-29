<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Instansi;
use App\Pegawai;

class InstansiController extends Controller
{
    public function index()
    {
        $opd = Instansi::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.instansi', compact('instansi','opd'));
    }

    public function simpan(Request $r)
    {
        $instansi = Instansi::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('instansi')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $instansi = Instansi::findOrFail($r->id);
        $instansi->update($r->all());
        return redirect()->route('instansi')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $instansi = Instansi::findOrFail($r->id);
        $instansi->delete();
        return redirect()->route('instansi')->with('hapus','Data Berhasil di Hapus');
    }
}
