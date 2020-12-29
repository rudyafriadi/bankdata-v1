<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $table = "pic";
    protected $fillable = [
        'nama','alamat','no_hp','status'
    ];

    public function tower()
    {
        return $this->hasMany("App\Tower");
    }

    public function site()
    {
        return $this->hasMany("App\Site");
    }
}
