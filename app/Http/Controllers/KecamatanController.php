<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kecamatan;
use App\Pegawai;
use App\Kelurahan;
use App\Role;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $role = Auth::user()->role_id;
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.kecamatan', compact('kecamatan','instansi','kelurahan','role'));
    }

    public function simpan(Request $r)
    {
        $kecamatan = Kecamatan::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('kecamatan')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $jabatan = Jabatan::findOrFail($r->id);
        $jabatan->update($r->all());
        return redirect()->route('jabatan')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $jabatan = Jabatan::findOrFail($r->id);
        $jabatan->delete();
        return redirect()->route('jabatan')->with('hapus','Data Berhasil di Hapus');
    }
}
