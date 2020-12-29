<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = "operator";
    protected $fillable = [
        'n_operator','status'
    ];

    public function site()
    {
        return $this->hasMany("App\Site");
    }
}
