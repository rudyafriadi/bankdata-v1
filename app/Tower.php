<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    protected $table = "tower";
    protected $fillable = [
        'sitename','kecamatan_id','kelurahan_id','lat','long','s_pemilik','s_signal','provider_id','info_tower','program_id','pic_id','s_power','tahun','gambar','status'
    ];

    public function provider()
    {
        return $this->belongsTo("App\Provider");
    }

    public function program()
    {
        return $this->belongsTo("App\Program");
    }

    public function pic()
    {
        return $this->belongsTo("App\Pic");
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
