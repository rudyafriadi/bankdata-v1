<?php

namespace App\Http\Controllers\diskominfotik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Provider;
use App\Pegawai;

class ProviderController extends Controller
{
    public function index()
    {
        $provider = Provider::all();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.provider', compact('provider','instansi','role'));
    }

    public function simpan(Request $r)
    {
        $provider = Provider::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('provider')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $provider = Provider::findOrFail($r->id);
        $provider->update($r->all());
        return redirect()->route('provider')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $provider = Provider::findOrFail($r->id);
        $provider->delete();
        return redirect()->route('provider')->with('hapus','Data Berhasil di Hapus');
    }
}
