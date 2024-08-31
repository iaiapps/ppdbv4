<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Timeline;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // timeline
        $gelombang_1 = Timeline::where('type', 'gelombang_1')->get();
        $gelombang_2 = Timeline::where('type', 'gelombang_2')->get();
        $other = Timeline::where('type', 'other')->get();

        // tagline
        $taglines = Setting::where('name', 'tagline')->get();
        // contact
        $contacts = Setting::where('name', 'kontak')->get();
        // onoff
        $onoff = Setting::where('name', 'onoff')->first();

        if (isset($onoff) && $onoff->value == 0) {
            return view('landing.indexoff');
        } else {
            return view('landing.index', compact('contacts', 'gelombang_1', 'gelombang_2', 'other', 'taglines'));
        }
    }
}
