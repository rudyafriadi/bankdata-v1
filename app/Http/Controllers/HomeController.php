<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pegawai;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Barang;
use App\Satuan;
use App\Komoditas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // $id = bcrypt($data->instansi_id);
            // dd($instansi);  
        }
        
        return view('home2', compact('instansi','id'));
    }

    public function landingpage()
    {
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // $id = bcrypt($data->instansi_id);
            // dd($instansi);  
        }
        return view ('landingpage', compact('instansi','id'));
    }

    public function home_diskominfotik(Request $r)
    {
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
          
        return view('page/diskominfotik/home', compact('id','instansi'));
    }

    public function home_dkumpp(Request $r)
    {
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
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
          
        // return view('page/dkumpp/home', compact('id','instansi'));
    }

    public function cekqrcode()
    {
        return view ('page/diskominfotik/qrcode/qrcodettd');
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('front');
    }
}
