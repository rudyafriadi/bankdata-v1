<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = "kecamatan";

    protected $fillable = [
        'n_kec','kelurahan_id','status'
    ];

    public function site()
    {
        return $this->hasMany("App\Site");
    }

    public function kelurahan()
    {
        return $this->hasMany("App\Kelurahan");
    }
}
