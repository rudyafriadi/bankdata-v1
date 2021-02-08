<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Pegawai;
use App\User;
use App\Golongan;
use App\Jabatan;
use App\Instansi;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class PegawaiController extends Controller
{

    public function index()
    {
        $pegawai = Pegawai::all();
        $user = Auth::user()->id;
        $role = Auth::user()->role_id;
        $pegawai_id = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai_id as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }
        return view ('page.settings.pegawai', compact('pegawai','instansi','pegawai_id','role'));
    }

    public function create(Request $r)
    {
        $golongan = Golongan::all();
        $role = Auth::user()->role_id;
        $roles = Role::all();
        $jabatan = Jabatan::all();
        $opd = Instansi::all();
        $user = Auth::user()->id;
        $pegawai = Pegawai::where('users_id', $user)->get();
        foreach ($pegawai as $data) {
            $instansi = $data->instansi->n_instansi;
            $id = $data->instansi_id;
            // dd($instansi);  
        }

        return view ('page.settings.createpegawai', compact('golongan','jabatan','instansi','opd','role','roles'));
    }

    public function simpan(Request $r)
    {
        $this->validate($r, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->role_id = $r->role_id;
        $user->username = $r->username;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        $user->status = $r->status;
        $user->save();

        $r->request->add(['users_id' => $user->id ]);
        $pegawai = Pegawai::create($r->all());

        // $pegawai = new Pegawai;
        // $pegawai->golongan_id =  $r->golongan_id;
        // $pegawai->jabatan_id = $r->jabatan_id;
        // $pegawai->users_id = $users->id;
        // $pegawai->instansi_id = $r->instansi_id;
        // $pegawai->nip = $r->nip;
        // $pegawai->name = $r->name;
        // $pegawai->alamat = $r->alamat;
        // $pegawai->status = $r->status;
        // $pegawai->save();

        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return redirect()->route('pegawai')->with('simpan','Data Berhasil disimpan');
    }

    public function update(Request $r)
    {
        // dd($r->all());
        $pegawai = Pegawai::findOrFail($r->id);
        $pegawai->update($r->all());
        return redirect()->route('pegawai')->with('update','Data Berhasil di Update');
    }

    public function delete(Request $r)
    {
        $pegawai = Pegawai::findOrFail($r->id);
        $pegawai->delete();
        return redirect()->route('pegawai')->with('hapus','Data Berhasil di Hapus');
    }
}
