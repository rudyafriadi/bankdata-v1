<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = "instansi";
    protected $fillable = [
        'n_instansi','alamat','status'
    ];

    public function pegawai()
    {
        return $this->hasMany("App\Pegawai");
    }
}
