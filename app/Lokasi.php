<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = "lokasi";

    protected $fillable = [
        'kecamatan_id','kelurahan_id','status'
    ];

    public function kecamatan()
    {
        return $this->belongsTo("App\Kecamatan");
    }

    public function Kelurahan()
    {
        return $this->belongsTo("App\Kelurahan");
    }
}
