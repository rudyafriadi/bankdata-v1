<?php

namespace App\Http\Controllers\diskominfotik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dokumen;
use App\Pegawai;

class DokumenController extends Controller
{
    public function smasukaplikasi()
    {
        $dokumen = Dokumen::where('j_doc','1')->where('kat_doc','1')->get();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.aplikasi.suratmasuk', compact('dokumen','instansi','role'));
    }

    public function skeluaraplikasi()
    {
        $dokumen = Dokumen::where('j_doc','2')->where('kat_doc','1')->get();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.aplikasi.suratkeluar', compact('dokumen','instansi','role'));
    }

    public function smasuktower()
    {
        $dokumen = Dokumen::where('j_doc','1')->where('kat_doc','2')->get();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.tower.suratmasuk', compact('dokumen','instansi','role'));
    }

    public function skeluartower()
    {
        $dokumen = Dokumen::where('j_doc','2')->where('kat_doc','2')->get();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.tower.suratkeluar', compact('dokumen','instansi','role'));
    }

    public function simpan(Request $r)
    {
        $dokumen = new Dokumen;
        $dokumen->no_doc = $r->no_doc;
        $dokumen->perihal = $r->perihal;
        $dokumen->tgl_doc = $r->tgl_doc;
        $dokumen->kat_doc = $r->kat_doc;
        $dokumen->j_doc = $r->j_doc;
        $dokumen->status = $r->status;
        if ($r->hasfile('doc')){
            $doc = $r->file('doc');
            $extension = $doc->getClientOriginalExtension();
            $filename = $doc->getClientOriginalName();
            $doc->move(public_path('storage/dokumen/masuk'), $filename);
            $dokumen->doc = $filename;
        }
        $dokumen->save();

        if($r->j_doc == 1 && $r->kat_doc == 1){
            return redirect()->route('smasukaplikasi')->with('simpan','Data Berhasil disimpan');
        } elseif($r->j_doc == 2 && $r->kat_doc == 1){
            return redirect()->route('skeluaraplikasi')->with('simpan','Data Berhasil disimpan');
        } elseif($r->j_doc == 1 && $r->kat_doc == 2){
            return redirect()->route('smasuktower')->with('simpan','Data Berhasil disimpan');
        } else {
            return redirect()->route('skeluartower')->with('simpan','Data Berhasil disimpan');
        }

    }

    
}
