<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kelurahan;
use App\Kecamatan;
use App\Pegawai;
use App\Role;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.kelurahan', compact('kelurahan','instansi','kecamatan','role'));
    }

    public function simpan(Request $r)
    {
        $kelurahan = Kelurahan::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('kelurahan')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $kelurahan = Kelurahan::findOrFail($r->id);
        $kelurahan->update($r->all());
        return redirect()->route('kelurahan')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $kelurahan = Kelurahan::findOrFail($r->id);
        $kelurahan->delete();
        return redirect()->route('kelurahan')->with('hapus','Data Berhasil di Hapus');
    }
}
