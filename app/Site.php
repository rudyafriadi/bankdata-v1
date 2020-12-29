<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = "site";
    protected $fillable = [
        'kecamatan_id','kelurahan_id','provider_id','operator_id','pic_id','n_site','s_jaringan','lat','long','tahun','ket','status','gambar'
    ];

    public function provider()
    {
        return $this->belongsTo("App\Provider");
    }

    public function pic()
    {
        return $this->belongsTo("App\Pic");
    }

    public function operator()
    {
        return $this->belongsTo("App\Operator");
    }

    public function kelurahan()
    {
        return $this->belongsTo("App\Kelurahan");
    }

    public function kecamatan()
    {
        return $this->belongsTo("App\Kecamatan");
    }
}
