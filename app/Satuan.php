<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $connection = 'dkumpp';
    protected $table = 'satuan';
    protected $fillable = [
        'n_satuan','keterangan','status'
    ];

    public function komoditas()
    {
        return $this->hasMany("App\Komoditas");
    }
}
