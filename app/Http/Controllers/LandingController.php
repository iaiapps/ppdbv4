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
        $tahap_1 = Timeline::where('type', 'tahap_1')->get();
        $tahap_2 = Timeline::where('type', 'tahap_2')->get();
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
            return view('landing.index', compact('contacts', 'tahap_1', 'tahap_2', 'other', 'taglines'));
        }
    }
}
