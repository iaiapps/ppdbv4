<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    // Function terima tolak
    public function activated(Request $request)
    {
        $user = User::where('id', $request->id)->get()->first();
        $user->syncRoles('akun_aktif');
        return redirect()->route('user.index');
    }

    // Function terima tolak
    public function accepted(Request $request)
    {
        $user = User::where('id', $request->id)->get()->first();
        // dd($user);
        $user->syncRoles('akun_diterima');
        return redirect()->route('admstudent.index');
    }

    public function rejected(Request $request)
    {
        $user = User::where('id', $request->id)->get()->first();
        // dd($user);
        $user->syncRoles('akun_ditolak');
        return redirect()->route('admstudent.index');
    }
}
