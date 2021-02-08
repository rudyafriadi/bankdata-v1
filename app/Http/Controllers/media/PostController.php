<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Publikasi;
use App\Media;
use App\Pegawai;
use App\Instansi;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role_id;
        $media = Instansi::where('status','2')->get();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        if ($role == 3) {
            $post = Post::all();
        } else {
            $post = Post::where('media', $instansi )->get();
        }
        
        return view ('page.media.post', compact('post','instansi','media','role'));
    }

    public function simpan(Request $r)
    {
        $post = Post::create($r->all());
        return redirect()->route('post')->with('simpan','Data Berhasil disimpan');
    }

    public function FilterByYear(Request $r)
    {
        
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        $kadis = Pegawai::where('jabatan_id', 3)->where('instansi_id', 1)->get();
        $media = Instansi::where('status','2')->get();
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
                if ($role == 3) {
                    $post = Post::all();
                } else {
                    $post = Post::where('media', $instansi )->get();
                }
                return view ('page.media.post', compact('post','cari','instansi','qrcode','role','media'));
            } else {
                if ($role == 3) {
                    $post = Post::where('media','like',"%".$cari."%")->get();
                } else {
                    $post = Post::where('media', $instansi )->where('media','like',"%".$cari."%")->get();
                }
                // $website = Website::where('tahun_pembuatan','like',"%".$cari."%")->get();
                return view ('page.media.post', compact('post','cari','instansi','qrcode','role','media'));
            }
            
        } else {
            if ($cari == 'all') {
                $post = Post::all();
                return view ('page.media.exportpdf.exportpost', compact('post','cari','instansi','qrcode','namakadis','role'));
                $pdf = PDF::loadView('page.media.exportpdf.exportpost', compact('post','cari','instansi','qrcode','namakadis','role'));
                // return $pdf->download('website'.date('Y-m-d_H-i-s').'.pdf');
            } else {
                $post = Post::where('media', $cari)->get();
                return view ('page.media.exportpdf.exportpost', compact('post','cari','instansi','qrcode','namakadis','role'));

                $pdf = PDF::loadView('page.media.exportpdf.exportpost', compact('post','cari','instansi','role'));
                // return $pdf->download('website_'.date('Y-m-d_H-i-s').'.pdf');
            }
            
            
        }
        
    }
}
