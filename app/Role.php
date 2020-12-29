<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    protected $fillable = [
        'n_role','status'
    ];

    public function tower()
    {
        return $this->hasMany("App\Tower");
    }
}
