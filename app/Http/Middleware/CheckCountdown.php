<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;
use Carbon\Carbon;

class CheckCountdown
{
    public function handle(Request $request, Closure $next)
    {
        $countdown = Setting::where('name', 'countdown')->first();

        if ($countdown && $countdown->value) {
            $countdownDate = Carbon::parse($countdown->value);
            if (now()->lt($countdownDate)) {
                return redirect()->route('landing')
                    ->with('info', 'PPDB belum dibuka. Silakan tunggu hingga countdown berakhir.');
            }
        }

        return $next($request);
    }
}
