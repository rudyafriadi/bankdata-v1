<?php

namespace App\Http\Controllers\diskominfotik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Program;
use App\Pegawai;

class ProgramController extends Controller
{
    public function index()
    {
        $program = Program::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.diskominfotik.tower.program', compact('program','instansi'));
    }

    public function simpan(Request $r)
    {
        $program = Program::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('program')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $program = Program::findOrFail($r->id);
        $program->update($r->all());
        return redirect()->route('program')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $program = Program::findOrFail($r->id);
        $program->delete();
        return redirect()->route('program')->with('hapus','Data Berhasil di Hapus');
    }
}
