<?php

namespace App\Http\Controllers\dkumpp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Barang;
use App\Satuan;
use App\Merk;
use App\Komoditas;
use App\Pegawai;

class KomoditasController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $satuan = Satuan::all();
        $merk = Merk::all();
        $komoditas = Komoditas::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.dkumpp.komoditas', compact('barang','instansi','komoditas','satuan','merk'));
    }

    public function simpan(Request $r)
    {
        $komoditas = Komoditas::create($r->all());
        return redirect()->route('komoditas')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $komoditas = Komoditas::findOrFail($r->id);
        $komoditas->update($r->all());
        return redirect()->route('komoditas')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $komoditas = Komoditas::findOrFail($r->id);
        $komoditas->delete();
        return redirect()->route('komoditas')->with('hapus','Data Berhasil di Hapus');
    }

    public function FilterByYear(Request $r)
    {
        
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        $barang = Barang::all();
        $satuan = Satuan::all();
        $merk = Merk::all();
        $kadis = Pegawai::where('jabatan_id', 3)->where('instansi_id', 3)->get();
        foreach ($kadis as $data) {
            $namakadis = $data->name;
            $idkadis = bcrypt($data->id);
            $qrcode = QrCode::size(100)->generate( url('komoditas/cekqrcode/'.$idkadis) );
        }

        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $idjabatan = $data->jabatan->n_jabatan;
            $id = $data->instansi_id;
        }
        $qrcode = QrCode::size(100)->generate( url('cekqrcode/id') );
        $cari = $r->cari;
        $pilih = $r->pilih;
        // $website = Website::where('tahun_pembuatan','like',"%".$cari."%")->get();
        // return view ('page.diskominfotik.exportpdf.exportweb', compact('website','cari','instansi','qrcode','namakadis'));
        // dd($pilih);
        if ($pilih == 1) {
            if ($cari == 'all') {
                $komoditas = Komoditas::all();
                return view ('page.dkumpp.komoditas', compact('komoditas','cari','instansi','qrcode','barang','satuan','merk'));
            } else {
                $komoditas = Komoditas::where('barang_id','like',"%".$cari."%")->get();
                return view ('page.dkumpp.komoditas', compact('komoditas','cari','instansi','qrcode','barang','satuan','merk'));
            }
            
        } else {
            if ($cari == 'all') {
                $komoditas = Komoditas::all();
                return view ('page.dkumpp.exportpdf.exportkomoditas', compact('komoditas','cari','instansi','qrcode','namakadis','merk','barang','satuan'));
                $pdf = PDF::loadView('page.dkumpp.exportpdf.exportkomoditas', compact('komoditas','cari','instansi','qrcode','namakadis','satuan','barang','merk'));
                // return $pdf->download('website'.date('Y-m-d_H-i-s').'.pdf');
            } else {
                $komoditas = Komoditas::where('barang_id', $cari)->get();
                return view ('page.dkumpp.exportpdf.exportkomoditas', compact('komoditas','cari','instansi','qrcode','namakadis','barang','satuan','merk'));

                $pdf = PDF::loadView('page.dkumpp.exportpdf.exportkomoditas', compact('komoditas','cari','instansi','barang','satuan','qrcode','merk'));
                // return $pdf->download('website_'.date('Y-m-d_H-i-s').'.pdf');
            }
            
            
        }
        
    }

    public function grafik()
    {
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        // $komoditas = Komoditas::orderBy('tanggal','asc')->where('barang_id','1')->get();
        
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
        }

        $categories = [];
        $beras = [];
        $gula = [];
        $tepung = [];
        $minyak = [];
        $komoditas1 = Komoditas::orderBy('tanggal','asc')->where('barang_id', 1)->get()->unique('tanggal');
        foreach ($komoditas1 as $kom1) { 
            $categories[] = $kom1->tanggal;
            $beras[] = $kom1->harga;
        }
        $komoditas2 = Komoditas::orderBy('tanggal','asc')->where('barang_id', 2)->get()->unique('tanggal');
        foreach ($komoditas2 as $kom2) { 
            $categories[] = $kom2->tanggal;
            $gula[] = $kom2->harga;
        }
        $komoditas3 = Komoditas::orderBy('tanggal','asc')->where('barang_id', 3)->get()->unique('tanggal');
        foreach ($komoditas3 as $kom3) { 
            $categories[] = $kom3->tanggal;
            $tepung[] = $kom3->harga;
        }
        $komoditas4 = Komoditas::orderBy('tanggal','asc')->where('barang_id', 4)->get()->unique('tanggal');
        foreach ($komoditas4 as $kom4) { 
            $categories[] = $kom4->tanggal;
            $minyak[] = $kom4->harga;
        }
        return view ('page.dkumpp.grafik', compact('instansi','categories','beras','gula','tepung','minyak'));
    }
}
