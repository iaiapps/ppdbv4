<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RegExport implements FromView
{
    public function view(): View
    {
        $users = User::role('akun_diterima')->get();
        
        return view('admin.setcostreg.export', [
            'users' => $users
        ]);
    }
}
