<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PiketController extends Controller
{
    public function index()
    {
        return view('piket');
    }
}
