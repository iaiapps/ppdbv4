<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /** @var \App\Models\User */
        $user = Auth::user();

        //jika pakai spatie
        $total = User::where('name', '!=', 'admin')->get();
        $akun_dibuat = User::role('akun_dibuat')->get();
        $akun_aktif = User::role('akun_aktif')->get();
        $akun_isi_formulir = User::role('akun_isi_formulir')->get();
        $akun_diterima = User::role('akun_diterima')->get();
        $akun_ditolak = User::role('akun_ditolak')->get();

        if ($user->hasRole('admin')) {
            return view('admin.home', compact('total', 'akun_dibuat', 'akun_aktif', 'akun_isi_formulir', 'akun_diterima', 'akun_ditolak'));
        } elseif ($user->hasRole('akun_dibuat')) {
            return view('student.bridge', compact('user'));
        } elseif ($user->hasRole('akun_aktif')) {
            return redirect()->route('student.create');
        } elseif ($user->hasRole(['akun_isi_formulir', 'akun_diterima', 'akun_ditolak'])) {
            return redirect()->route('student.home');
        }
    }
}
