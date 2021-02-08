<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $connection = 'media';
    protected $table = "berita";
    protected $fillable = [
        'no_rilis','tentang','judul','tgl_upload','tgl_limit','status','keterangan','url','media'
    ];
}
