<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = "provider";
    protected $fillable = [
        'nama_provider','status'
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
