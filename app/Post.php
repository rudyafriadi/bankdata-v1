<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'media';
    protected $table = "post";
    protected $fillable = [
        'judul','link','media','tgl_posting','status'
    ];
}
