<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {

        $times = Timeline::all();
        return view('landing.index', compact('times'));
    }
}
