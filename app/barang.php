<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $connection = 'dkumpp';
    protected $table = 'barang';
    protected $fillable = [
        'n_barang','status'
    ];

    public function komoditas()
    {
        return $this->hasMany("App\Komoditas");
    }

}
