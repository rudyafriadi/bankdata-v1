<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $connection = 'dkumpp';
    protected $table = 'komoditas';
    protected $fillable = [
        'barang_id','merk_id','satuan_id','harga','tanggal','status'
    ];

    public function barang()
    {
        return $this->belongsTo("App\Barang");
    }

    public function satuan()
    {
        return $this->belongsTo("App\Satuan");
    }

    public function merk()
    {
        return $this->belongsTo("App\Merk");
    }
}
