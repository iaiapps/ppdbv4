<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Timeline;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $times = Timeline::all();
        $contacts = Setting::where('name', 'kontak')->get();

        $onoff = Setting::where('name', 'onoff')->first();

        if (isset($onoff) && $onoff->value == 0) {
            return view('landing.indexoff');
        } else {
            return view('landing.index', compact('times', 'contacts'));
        }
    }
}
