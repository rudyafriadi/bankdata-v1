<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $connection = 'media';
    protected $table = "media";
    protected $fillable = [
        'nama','alamat','email','status'
    ];
}
