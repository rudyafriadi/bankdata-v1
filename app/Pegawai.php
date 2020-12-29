<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $fillable = [
        'id','golongan_id','jabatan_id','users_id','instansi_id','nip','name','alamat','ttd','paraf','status'
    ];

    public function instansi()
    {
        return $this->belongsTo("App\Instansi");
    }

    public function jabatan()
    {
        return $this->belongsTo("App\Jabatan");
    }

    public function golongan()
    {
        return $this->belongsTo("App\Golongan");
    }

    
}
