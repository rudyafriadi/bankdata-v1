<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RincianController extends Controller
{
    public function index()
    {
        return view ('page.diskominfotik.rincianspj.rincian');
    }
}
