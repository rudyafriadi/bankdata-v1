<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $connection = 'dkumpp';
    protected $table = 'merk';
    protected $fillable = [
        'n_merk','status'
    ];

    public function komoditas()
    {
        return $this->hasMany("App\Komoditas");
    }
}
