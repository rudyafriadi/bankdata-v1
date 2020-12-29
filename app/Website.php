<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = "website";
    protected $fillable = [
        'nama_web','bhs_pemrograman','dbase','tahun_pembuatan','url','gambar','status'
    ];

}
