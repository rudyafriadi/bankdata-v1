<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = "dokumen";

    protected $fillable = [
        'no_doc','perihal','tgl_doc','doc','kat_doc','j_doc','status'
    ];
}
