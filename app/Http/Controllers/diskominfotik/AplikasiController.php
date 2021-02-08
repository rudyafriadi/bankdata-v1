<?php

namespace App\Http\Controllers\diskominfotik;

use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Website;
use App\Pegawai;
use PDF;

class AplikasiController extends Controller
{
    public function index()
    {
        $website = Website::all();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.aplikasi.website', compact('website','instansi','role'));
    }

    public function detail(Request $r)
    {
        $website = Website::findOrFail($r->id);
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.aplikasi.websitedetail', compact('website','instansi','role'));
    }

    public function create(Request $r)
    {
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
        }
        return view ('page.diskominfotik.aplikasi.create', compact('instansi','role'));
    }

    public function simpan(Request $r)
    {
        $this->validate($r, [
            'nama_web' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|string|max:255',
            'bhs_pemrograman' => 'required|string|max:255',
            'dbase' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'status' => 'required|integer|max:255',
            'gambar'=> 'image|mimes:jpeg,png,jpg|max:10000'
        ]);

        $website = new Website;
        $website->nama_web = $r->nama_web;
        $website->tahun_pembuatan = $r->tahun_pembuatan;
        $website->bhs_pemrograman = $r->bhs_pemrograman;
        $website->dbase = $r->dbase;
        $website->url = $r->url;
        $website->status = $r->status;
        if ($r->hasfile('gambar')){
            $gambar = $r->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $filename = $gambar->getClientOriginalName();
            $gambar->move(public_path('storage/img_website/'), $filename);
            $website->gambar = $filename;
        }
        $website->save();

        return redirect()->route('website')->with('simpan','Data Berhasil disimpan');
    }

    public function edit(Request $r)
    {
        $website = Website::findOrFail($r->id);
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
        }
        return view ('page.diskominfotik.aplikasi.edit', compact('website','instansi','role'));
    }

    public function update(Request $r)
    {   
        $this->validate($r, [
            'name' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'bhs_pemrograman' => 'required|string|max:255',
            'dbase' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'status' => 'required|integer|max:255',
        ]);
        $updateweb = Website::findOrFail($r->id);
        $updateweb->nama_web = $r->name;
        $updateweb->tahun_pembuatan = $r->tahun;
        $updateweb->bhs_pemrograman = $r->bhs_pemrograman;
        $updateweb->dbase = $r->dbase;
        // $website->url = bcrypt($r->url);
        $updateweb->url = $r->url;
        $updateweb->status = $r->status;
        if ($r->hasfile('gambar')){
            $gambar = $r->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $filename = $gambar->getClientOriginalName();
            // $gambar = $r->file('gbr_gallery')->storeAs('img_galery', $filename);
            $gambar->move(public_path('storage/img_website/'), $filename);
            $updateweb->gambar = $filename;
        }
        $updateweb->save();

        return redirect()->route('website')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $website = Website::findOrFail($r->id);
        $website->delete();
        return redirect()->route('website')->with('hapus','Data Berhasil di Hapus');
    }

    public function FilterByYear(Request $r)
    {
        
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        $kadis = Pegawai::where('jabatan_id', 3)->where('instansi_id', 1)->get();
        foreach ($kadis as $data) {
            $namakadis = $data->name;
            $idkadis = Crypt::encrypt($data->id);
            $qrcode = QrCode::size(100)->generate( url('website/cekqrcode/'.$idkadis) );
        }

        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $idjabatan = $data->jabatan->n_jabatan;
            $id = $data->instansi_id;
        }
        // $qrcode = QrCode::size(100)->generate( url('cekqrcode/id') );
        $cari = $r->cari;
        $pilih = $r->pilih;
        // $website = Website::where('tahun_pembuatan','like',"%".$cari."%")->get();
        // return view ('page.diskominfotik.exportpdf.exportweb', compact('website','cari','instansi','qrcode','namakadis'));
        // dd($pilih);
        if ($pilih == 1) {
            if ($cari == 'all') {
                $website = Website::all();
                return view ('page.diskominfotik.aplikasi.website', compact('website','cari','instansi','qrcode','role'));
            } else {
                $website = Website::where('tahun_pembuatan','like',"%".$cari."%")->get();
                return view ('page.diskominfotik.aplikasi.website', compact('website','cari','instansi','qrcode','role'));
            }
            
        } else {
            if ($cari == 'all') {
                $website = Website::all();
                return view ('page.diskominfotik.exportpdf.exportweb', compact('website','cari','instansi','qrcode','namakadis','role'));
                $pdf = PDF::loadView('page.diskominfotik.exportpdf.exportweb', compact('website','cari','instansi','qrcode','namakadis','role'));
                // return $pdf->download('website'.date('Y-m-d_H-i-s').'.pdf');
            } else {
                $website = Website::where('tahun_pembuatan', $cari)->get();
                return view ('page.diskominfotik.exportpdf.exportweb', compact('website','cari','instansi','qrcode','namakadis','role'));

                $pdf = PDF::loadView('page.diskominfotik.exportpdf.exportweb', compact('website','cari','instansi','role'));
                // return $pdf->download('website_'.date('Y-m-d_H-i-s').'.pdf');
            }
            
            
        }
        
    }

    public function grafik()
    {
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        $website = Website::orderBy('tahun_pembuatan','asc')->get()->unique('tahun_pembuatan');
        // dd($website);
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
        }
        $categories = [];
        $data = [];
        foreach ($website as $web) { 
            $categories[] = $web->tahun_pembuatan;
            $data[] = Website::where('tahun_pembuatan', $web->tahun_pembuatan)->distinct()->count();
        }
        return view ('page.diskominfotik.aplikasi.grafik', compact('instansi','categories','data','role'));
    }

    public function cekqrcode()
    {
        $kadis = Pegawai::where('jabatan_id', 3)->where('instansi_id', 1)->get();
        foreach ($kadis as $data) {
            $namakadis = $data->name;
            $idkadis = $data->id;
            // dd($idkadis);
            // $qrcode = QrCode::size(100)->generate( url('website/cekqrcode/'.$idkadis) );
        }
        $website = Website::all();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }

        return view ('page.diskominfotik.aplikasi.cekqrcode', compact('namakadis','idkadis','instansi'));
    }

    
}
