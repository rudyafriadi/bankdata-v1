<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publikasi;
use App\Tower;
use App\Kecamatan;
use App\Operator;
use App\Website;

class FrontController extends Controller
{
    public function front()
    {
        return view('home2');
    }

    public function media()
    {
        $publikasi = Publikasi::all();
        return view ('page.media.frontend.publikasi', compact('publikasi'));
    }

    public function komunikasi()
    {
       return view ('page.diskominfotik.frontend.towerfront');
    }

    public function datatower()
    {
        $tower = Tower::all();
        $kecamatan = Kecamatan::all();
        $operator = Operator::all();
        
        $towerkec = Kecamatan::withCount('tower')->get();
        $towerprov = Tower::withCount('provider')->get();

        $telkomsel1 = Tower::where('provider_id', 1)->where('kecamatan_id', 1)->count();
        $indosat1 = Tower::where('provider_id', 10)->where('kecamatan_id', 1)->count();
        $xl1 = Tower::where('provider_id', 11)->where('kecamatan_id', 1)->count();
        $smartfren1 = Tower::where('provider_id', 12)->where('kecamatan_id', 1)->count();
        $total1 = $telkomsel1 + $indosat1 + $xl1 + $smartfren1;

        $telkomsel2 = Tower::where('provider_id', 1)->where('kecamatan_id', 2)->count();
        $indosat2 = Tower::where('provider_id', 10)->where('kecamatan_id', 2)->count();
        $xl2 = Tower::where('provider_id', 11)->where('kecamatan_id', 2)->count();
        $smartfren2 = Tower::where('provider_id', 12)->where('kecamatan_id', 2)->count();
        $total2 = $telkomsel2 + $indosat2 + $xl2 + $smartfren2;
        
        $telkomsel3 = Tower::where('provider_id', 1)->where('kecamatan_id', 3)->count();
        $indosat3 = Tower::where('provider_id', 10)->where('kecamatan_id', 3)->count();
        $xl3 = Tower::where('provider_id', 11)->where('kecamatan_id', 3)->count();
        $smartfren3 = Tower::where('provider_id', 12)->where('kecamatan_id', 3)->count();
        $total3 = $telkomsel3 + $indosat3 + $xl3 + $smartfren3;

        $telkomsel4 = Tower::where('provider_id', 1)->where('kecamatan_id', 4)->count();
        $indosat4 = Tower::where('provider_id', 10)->where('kecamatan_id', 4)->count();
        $xl4 = Tower::where('provider_id', 11)->where('kecamatan_id', 4)->count();
        $smartfren4 = Tower::where('provider_id', 12)->where('kecamatan_id', 4)->count();
        $total4 = $telkomsel4 + $indosat4 + $xl4 + $smartfren4;

        $telkomsel5 = Tower::where('provider_id', 1)->where('kecamatan_id', 5)->count();
        $indosat5 = Tower::where('provider_id', 10)->where('kecamatan_id', 5)->count();
        $xl5 = Tower::where('provider_id', 11)->where('kecamatan_id', 5)->count();
        $smartfren5 = Tower::where('provider_id', 12)->where('kecamatan_id', 5)->count();
        $total5 = $telkomsel5 + $indosat5 + $xl5 + $smartfren5;

        $telkomsel6 = Tower::where('provider_id', 1)->where('kecamatan_id', 6)->count();
        $indosat6 = Tower::where('provider_id', 10)->where('kecamatan_id', 6)->count();
        $xl6 = Tower::where('provider_id', 11)->where('kecamatan_id', 6)->count();
        $smartfren6 = Tower::where('provider_id', 12)->where('kecamatan_id', 6)->count();
        $total6 = $telkomsel6 + $indosat6 + $xl6 + $smartfren6;

        $telkomsel7 = Tower::where('provider_id', 1)->where('kecamatan_id', 7)->count();
        $indosat7 = Tower::where('provider_id', 10)->where('kecamatan_id', 7)->count();
        $xl7 = Tower::where('provider_id', 11)->where('kecamatan_id', 7)->count();
        $smartfren7 = Tower::where('provider_id', 12)->where('kecamatan_id', 7)->count();
        $total7 = $telkomsel7 + $indosat7 + $xl7 + $smartfren7;

        $telkomsel8 = Tower::where('provider_id', 1)->where('kecamatan_id', 8)->count();
        $indosat8 = Tower::where('provider_id', 10)->where('kecamatan_id', 8)->count();
        $xl8 = Tower::where('provider_id', 11)->where('kecamatan_id', 8)->count();
        $smartfren8 = Tower::where('provider_id', 12)->where('kecamatan_id', 8)->count();
        $total8 = $telkomsel8 + $indosat8 + $xl8 + $smartfren8;

        $telkomsel9 = Tower::where('provider_id', 1)->where('kecamatan_id', 9)->count();
        $indosat9 = Tower::where('provider_id', 10)->where('kecamatan_id', 9)->count();
        $xl9 = Tower::where('provider_id', 11)->where('kecamatan_id', 9)->count();
        $smartfren9 = Tower::where('provider_id', 12)->where('kecamatan_id', 9)->count();
        $total9 = $telkomsel9 + $indosat9 + $xl9 + $smartfren9;

        $telkomsel10 = Tower::where('provider_id', 1)->where('kecamatan_id', 10)->count();
        $indosat10 = Tower::where('provider_id', 10)->where('kecamatan_id', 10)->count();
        $xl10 = Tower::where('provider_id', 11)->where('kecamatan_id', 10)->count();
        $smartfren10 = Tower::where('provider_id', 12)->where('kecamatan_id', 10)->count();
        $total10 = $telkomsel10 + $indosat10 + $xl10 + $smartfren10;

        
        return view ('page.diskominfotik.frontend.tower.datatower', compact('tower','towerkec','towerprov','telkomsel1','indosat1','xl1','smartfren1','total1','telkomsel2','indosat2','xl2','smartfren2','total2','telkomsel3','indosat3','xl3','smartfren3','total3','telkomsel4','indosat4','xl4','smartfren4','total4','telkomsel5','indosat5','xl5','smartfren5','total5','telkomsel6','indosat6','xl6','smartfren6','total6','telkomsel7','indosat7','xl7','smartfren7','total7','telkomsel8','indosat8','xl8','smartfren8','total8','telkomsel9','indosat9','xl9','smartfren9','total9','telkomsel10','indosat10','xl10','smartfren10','total10'));
    }

    public function grafiktower()
    {
        $tower = Tower::orderBy('tahun','asc')->get()->unique('tahun');
        $categories = [];
        $data = [];
        foreach ($tower as $tow) {
            $categories[] = $tow->tahun;
            $data[] = Tower::where('tahun',$tow->tahun)->latest()->count();
        }

        $towerkec = Kecamatan::withCount('tower')->get();
        $kec = [];
        $datakec = [];
        foreach ($towerkec as $tkec) {
            $kec[] = $tkec->n_kec;
            $datakec[] = $tkec->tower_count;
        }
        return view ('page.diskominfotik.frontend.tower.grafiktower', compact('categories','data','kec','datakec'));
    }

    public function dataaplikasi()
    {
        $website = Website::all();
        return view ('page.diskominfotik.frontend.aplikasi.dataaplikasi', compact('website'));
    }

    public function grafikaplikasi()
    {
        // $website = Website::all();
        $website = Website::orderBy('tahun_pembuatan','asc')->get()->unique('tahun_pembuatan');
        $categories = [];
        $data = [];
        foreach ($website as $tow) {
            $categories[] = $tow->tahun_pembuatan;
            $data[] = Website::where('tahun_pembuatan',$tow->tahun_pembuatan)->latest()->count();
        }
        return view ('page.diskominfotik.frontend.aplikasi.grafikaplikasi', compact('categories','data'));
    }
}
