<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = "jabatan";
    protected $fillable = [
        'n_jabatan','status'
    ];

    public function pegawai()
    {
        return $this->hasMany("App\Jabatan");
    }

}
