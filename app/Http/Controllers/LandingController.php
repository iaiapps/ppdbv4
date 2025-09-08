<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Setting;
use App\Models\Timeline;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // timeline
        $timelines = Timeline::all();

        // schedule
        $schedule = Setting::where('type', 'jadwal')->first();
        $early = Setting::where('type', 'early')->first();

        // contact
        $contacts = Setting::where('type', 'kontak')->get();

        // pelayanan
        $pelayanans = Setting::where('type', 'pelayanan')->get();

        // onoff
        $onoff = Setting::where('name', 'onoff')->first();
        $status = $onoff ? (int)$onoff->value : 1; // default ON

        // countdown
        $countdown = Setting::where('name', 'countdown')->first();
        $countdownDate = $countdown ? Carbon::parse($countdown->value) : null;

        // Kalau off
        if ($status === 0) {
            return view('landing.indexoff');
        }

        // Kalau countdown ada dan belum lewat, tampilkan halaman countdown
        if ($countdownDate && now()->lt($countdownDate)) {
            return view('landing.countdown', compact('countdownDate'));
        }

        // Default tampil landing normal
        return view('landing.index', compact('contacts', 'timelines', 'pelayanans', 'schedule', 'early'));
    }
}
