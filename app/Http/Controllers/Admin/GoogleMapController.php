<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class GoogleMapController extends Controller
{
    public function index()
    {
        return view('google-map.index');
    }
}
