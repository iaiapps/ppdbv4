<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function show()
    {
        return view('auth.branch');
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch' => 'required|in:sditharum_1,sditharum_2',
        ]);

        $branches = [
            'sditharum_1' => 'SDIT Harapan Umat 1',
            'sditharum_2' => 'SDIT Harapan Umat 2',
        ];

        session(['branch' => $request->branch]);
        session(['branch_name' => $branches[$request->branch]]);

        return redirect()->route('register');
    }
}
