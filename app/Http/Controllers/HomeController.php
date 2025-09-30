<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Setting;
use App\Models\Document;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        // Ambil timeline pengumuman
        $tanggal = Timeline::where('name', 'Pengumuman Hasil SPMB')->first()->date;
        $pengumuman = $this->parseIndonesianDate($tanggal);
        $today = Carbon::now();

        if ($user->hasRole('admin')) {
            return view('admin.home', compact('pengumuman', 'today', 'total', 'akun_dibuat', 'akun_aktif', 'akun_isi_formulir', 'akun_diterima', 'akun_ditolak'));
        } elseif ($user->hasRole('akun_dibuat')) {
            return view('student.bridge', compact('user'));
        } elseif ($user->hasRole('akun_aktif')) {
            return redirect()->route('student.create');
        } elseif ($user->hasRole(['akun_isi_formulir', 'akun_diterima', 'akun_ditolak'])) {
            return redirect()->route('student.home', compact('user', 'pengumuman', 'today'));
        }
    }
    function parseIndonesianDate($tanggal)
    {
        $mapBulan = [
            'Januari' => 'January',
            'Februari' => 'February',
            'Maret' => 'March',
            'April' => 'April',
            'Mei' => 'May',
            'Juni' => 'June',
            'Juli' => 'July',
            'Agustus' => 'August',
            'September' => 'September',
            'Oktober' => 'October',
            'November' => 'November',
            'Desember' => 'December',
        ];

        $tanggalInggris = strtr($tanggal, $mapBulan);
        return Carbon::parse($tanggalInggris);
    }

    public function statistic()
    {
        // Data per hari (7 hari terakhir)
        $daily = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->where('name', '!=', 'admin')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->map(function ($item) {
                $item->label = Carbon::parse($item->date)->translatedFormat('d M Y'); // contoh: 14 Sep 2025
                return $item;
            });

        // Data per bulan (12 bulan terakhir)
        $monthly = User::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as total'))
            ->where('name', '!=', 'admin')
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get()
            ->map(function ($item) {
                $item->label = Carbon::createFromFormat('Y-m', $item->month)->translatedFormat('F Y'); // contoh: September 2025
                return $item;
            });

        // Data per minggu (7 minggu terakhir)
        $weekly = User::select(DB::raw('YEARWEEK(created_at, 1) as week'), DB::raw('count(*) as total'))
            ->where('name', '!=', 'admin')
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->get()
            ->map(function ($item) {
                // Ambil tahun & minggu
                $year = substr($item->week, 0, 4);
                $week = substr($item->week, 4);

                // Tentukan awal minggu
                $startOfWeek = Carbon::now()->setISODate($year, $week)->startOfWeek();
                $endOfWeek = Carbon::now()->setISODate($year, $week)->endOfWeek();

                $item->label = $startOfWeek->translatedFormat('d M') . ' - ' . $endOfWeek->translatedFormat('d M Y');
                return $item;
            });

        return view('admin.statistic', compact('daily', 'weekly', 'monthly'));
    }
}
