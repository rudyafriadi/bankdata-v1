<?php

namespace App\Http\Controllers\diskominfotik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pic;
use App\Pegawai;

class PicController extends Controller
{
    public function index()
    {
        $pic = Pic::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.pic', compact('pic','instansi'));
    }

    public function simpan(Request $r)
    {
        $pic = Pic::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('pic')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $pic = Pic::findOrFail($r->id);
        $pic->update($r->all());
        return redirect()->route('pic')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $pic = Pic::findOrFail($r->id);
        $pic->delete();
        return redirect()->route('pic')->with('hapus','Data Berhasil di Hapus');
    }
}
