<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = "golongan";

    protected $fillable = [
        'n_golongan','status'
    ];
}
