<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        // I'll definitely do more with this in the future :)
        return view('index');
    }

    public function about()
    {
        // Probably going to move this somewhere else, too :)
        return view('about');
    }
}
