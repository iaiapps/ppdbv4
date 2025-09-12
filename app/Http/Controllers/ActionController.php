<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    // Function aktifkan akun
    public function activated(Request $request)
    {
        $user = User::where('id', $request->id)->get()->first();
        $user->syncRoles('akun_aktif');
        return redirect()->route('user.index');
    }

    // Function terima
    public function accepted(Request $request)
    {
        $user = User::where('id', $request->id)->get()->first();
        $user->syncRoles('akun_diterima');
        return redirect()->route('student.index');
    }

    // Function tolak
    public function rejected(Request $request)
    {
        $user = User::where('id', $request->id)->get()->first();
        $user->syncRoles('akun_ditolak');
        return redirect()->route('student.index');
    }

    // Function tolak
    public function retire(Request $request)
    {
        $user = User::where('id', $request->id)->get()->first();
        $user->syncRoles('akun_mengundurkan_diri');
        return redirect()->route('student.index');
    }
}
