<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // The 'home.index' tells Laravel to look for:
        // resources/views/home/index.blade.php
        return view('home.index');
    }
}
