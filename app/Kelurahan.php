<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = "kelurahan";
    protected $fillable = [
        'n_kel','kecamatan_id','status'
    ];

    public function site()
    {
        return $this->hasMany("App\Site");
    }

    public function kecamatan()
    {
        return $this->belongsTo("App\Kecamatan");
    }
}
