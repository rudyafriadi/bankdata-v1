<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Pegawai;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.role', compact('role','instansi'));
    }

    public function simpan(Request $r)
    {
        $jabatan = Jabatan::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('jabatan')->with('simpan','Data Berhasil disimpan');
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
