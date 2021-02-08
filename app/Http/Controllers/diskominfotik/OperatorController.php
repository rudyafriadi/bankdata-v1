<?php

namespace App\Http\Controllers\diskominfotik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Operator;
use App\Pegawai;

class OperatorController extends Controller
{
    public function index()
    {
        $operator = Operator::all();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.operator', compact('operator','instansi','role'));
    }

    public function simpan(Request $r)
    {
        $operator = Operator::create($r->all());
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('operator')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $operator = Operator::findOrFail($r->id);
        $operator->update($r->all());
        return redirect()->route('operator')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $operator = Operator::findOrFail($r->id);
        $operator->delete();
        return redirect()->route('operator')->with('hapus','Data Berhasil di Hapus');
    }
}
