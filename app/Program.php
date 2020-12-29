<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = "program";
    protected $fillable = [
        'n_program','status'
    ];

    public function tower()
    {
        return $this->hasMany("App\Tower");
    }
}
