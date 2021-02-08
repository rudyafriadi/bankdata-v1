<?php

namespace App\Http\Controllers\diskominfotik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Site;
use App\Pegawai;
use App\Provider;
use App\Pic;
use App\Lokasi;
use App\Operator;
use App\Kecamatan;
use App\Kelurahan;

use PDF;

class SiteController extends Controller
{
    public function index()
    {
        $site = Site::all();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.site.site', compact('site','instansi','role'));
    }

    public function create(Request $r)
    {
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $provider = Provider::all();
        $operator = Operator::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $pic = Pic::all();
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.site.create', compact('instansi','provider','pic','operator','kecamatan','kelurahan','role'));
    }

    public function simpan(Request $r)
    {
        $this->validate($r, [
            'n_site' => 'required|string|max:255',
            'kecamatan_id' => 'required|integer|max:255',
            'kelurahan_id' => 'required|integer|max:255',
            'provider_id' => 'required|integer|max:255',
            'operator_id' => 'required|integer|max:255',
            'pic_id' => 'required|integer|max:255',
            's_jaringan' => 'required|string|max:255',
            'lat' => 'required|string|max:255',
            'long' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'ket' => 'required|string|max:255',
            'status' => 'required|integer|max:255',
            'gambar'=> 'image|mimes:jpeg,png,jpg|max:10000'
        ]);

        $site = new Site;
        $site->n_site = $r->n_site;
        $site->kecamatan_id = $r->kecamatan_id;
        $site->kelurahan_id = $r->kelurahan_id;
        $site->provider_id = $r->provider_id;
        $site->operator_id = $r->operator_id;
        $site->pic_id = $r->pic_id;
        $site->s_jaringan = $r->s_jaringan;
        $site->lat = $r->lat;
        $site->long = $r->long;
        $site->tahun = $r->tahun;
        $site->ket = $r->ket;
        $site->status = $r->status;
        if ($r->hasfile('gambar')){
            $gambar = $r->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $filename = $gambar->getClientOriginalName();
            $gambar->move(public_path('storage/img_site/'), $filename);
            $site->gambar = $filename;
        }
        // dd($r->kelurahan_id);
        $site->save();

        return redirect()->route('site')->with('simpan','Data Berhasil disimpan');
    }

    function fetch(Request $request)
    {
        $data=Kelurahan::select('n_kel','id')->where('kecamatan_id',$request->id)->take(100)->get();
        // dd($data);
        return response()->json($data);//then sent this data to ajax success
	}

    public function detail(Request $r)
    {
        $tower = Tower::findOrFail($r->id);
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.tower.towerdetail', compact('tower','instansi','role'));
    }

    public function edit(Request $r)
    {
        $tower = Tower::findOrFail($r->id);
        $provider = Provider::all();
        $pic = Pic::all();
        $program = Program::all();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
        }
        return view ('page.diskominfotik.tower.edit', compact('tower','instansi','provider','pic','program','role'));
    }

    public function update(Request $r)
    {   
        $this->validate($r, [
            'sitename' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'lat' => 'required|string|max:255',
            'long' => 'required|string|max:255',
            's_pemilik' => 'required|string|max:255',
            's_signal' => 'required|string|max:255',
            'provider_id' => 'required|string|max:255',
            'info_tower' => 'required|string|max:255',
            'program_id' => 'required|string|max:255',
            'pic_id' => 'required|string|max:255',
            's_power' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'status' => 'required|integer|max:255',
            'gambar'=> 'image|mimes:jpeg,png,jpg|max:10000'
        ]);

        $tower = Tower::findOrFail($r->id);
        $tower->sitename = $r->sitename;
        $tower->lokasi = $r->lokasi;
        $tower->lat = $r->lat;
        $tower->long = $r->long;
        $tower->s_pemilik = $r->s_pemilik;
        $tower->s_signal = $r->s_signal;
        $tower->provider_id = $r->provider_id;
        $tower->info_tower = $r->info_tower;
        $tower->program_id = $r->program_id;
        $tower->pic_id = $r->pic_id;
        $tower->s_power = $r->s_power;
        $tower->tahun = $r->tahun;
        $tower->status = $r->status;
        if ($r->hasfile('gambar')){
            $gambar = $r->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $filename = $gambar->getClientOriginalName();
            $gambar->move(public_path('storage/img_tower/'), $filename);
            $tower->gambar = $filename;
        }
        $tower->save();

        return redirect()->route('tower')->with('update','Data Berhasil di Update');
    }
    
    public function grafik()
    {
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        $tower = Tower::orderBy('tahun','asc')->get()->unique('tahun');
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
        }
        $categories = [];
        $data = [];
        foreach ($tower as $tow) {
            $categories[] = $tow->tahun;
            $data[] = Tower::where('tahun',$tow->tahun)->latest()->count();
        }
        return view ('page.diskominfotik.tower.grafik', compact('instansi','categories','data','role'));
    }

    public function delete(Request $r)
    {
        $tower = Tower::findOrFail($r->id);
        $tower->delete();
        return redirect()->route('tower')->with('hapus','Data Berhasil di Hapus');
    }

    public function FilterByYear(Request $r)
    {
        
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        $kadis = Pegawai::where('jabatan_id', 3)->get();
        foreach ($kadis as $data) {
            $namakadis = $data->name;
            $qrcode = QrCode::size(100)->generate( url('cekqrcode/{{$data->id}}') );
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
                $tower = Tower::all();
                return view ('page.diskominfotik.tower.tower', compact('tower','cari','instansi','qrcode','role'));
            } else {
                $tower = Tower::where('tahun','like',"%".$cari."%")->get();
                return view ('page.diskominfotik.tower.tower', compact('tower','cari','instansi','qrcode','role'));
            }
            
        } else {
            if ($cari == 'all') {
                $tower = Tower::all();
                return view ('page.diskominfotik.exportpdf.exporttower', compact('tower','cari','instansi','qrcode','namakadis','role'));
                $pdf = PDF::loadView('page.diskominfotik.exportpdf.exportweb', compact('tower','cari','instansi','qrcode','namakadis','role'));
                return $pdf->download('tower'.date('Y-m-d_H-i-s').'.pdf');
            } else {
                $tower = Tower::where('tahun', $cari)->get();
                return view ('page.diskominfotik.exportpdf.exporttower', compact('tower','cari','instansi','qrcode','namakadis','role'));

                $pdf = PDF::loadView('page.diskominfotik.exportpdf.exporttower', compact('tower','cari','instansi','role'));
                return $pdf->download('tower'.date('Y-m-d_H-i-s').'.pdf');
            }
            
            
        }
        
    }
}
