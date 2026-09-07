<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    // Function aktifkan akun
    public function activated(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($validated['id']);
        $user->syncRoles('akun_aktif');
        return redirect()->route('user.index');
    }

    // Function terima
    public function accepted(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($validated['id']);
        $user->syncRoles('akun_diterima');
        return redirect()->route('student.index');
    }

    // Function tolak
    public function rejected(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($validated['id']);
        $user->syncRoles('akun_ditolak');
        return redirect()->route('student.index');
    }

    // Function undur diri
    public function retire(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($validated['id']);
        $user->syncRoles('akun_mengundurkan_diri');
        return redirect()->route('student.index');
    }

    // Function menonaktifkan akun
    public function notactive(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($validated['id']);
        $user->syncRoles('akun_nonaktif');
        return redirect()->route('user.index');
    }
}
