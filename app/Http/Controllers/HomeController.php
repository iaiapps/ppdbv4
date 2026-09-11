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

        // Set session branch dari User model (hanya untuk user yang punya branch)
        $branches = [
            'sditharum_1' => 'SDIT HARAPAN UMAT JEMBER',
            'sditharum_2' => 'HARAPAN UMAT - Nature Bilingual School',
        ];
        if ($user->branch) {
            session(['branch' => $user->branch]);
            session(['branch_name' => $branches[$user->branch] ?? 'SDIT HARAPAN UMAT JEMBER']);
        } else {
            session()->forget(['branch', 'branch_name']);
        }

        //jika pakai spatie
        $roles = ['akun_dibuat', 'akun_aktif', 'akun_isi_formulir', 'akun_diterima', 'akun_ditolak', 'akun_mengundurkan_diri'];
        $roleCounts = User::role($roles)->get()->countBy(fn($u) => $u->getRoleNames()->first());
        $total = User::where('name', '!=', 'admin')->count();
        $akun_dibuat = $roleCounts['akun_dibuat'] ?? 0;
        $akun_aktif = $roleCounts['akun_aktif'] ?? 0;
        $akun_isi_formulir = $roleCounts['akun_isi_formulir'] ?? 0;
        $akun_diterima = $roleCounts['akun_diterima'] ?? 0;
        $akun_ditolak = $roleCounts['akun_ditolak'] ?? 0;
        $akun_mengundurkan_diri = $roleCounts['akun_mengundurkan_diri'] ?? 0;

        // Ambil timeline pengumuman
        $tanggal = Timeline::where('name', 'Pengumuman Hasil SPMB')->first()->date;
        $pengumuman = $this->parseIndonesianDate($tanggal);
        $today = Carbon::now();

        if ($user->hasRole('admin')) {
            return view('admin.home', compact('pengumuman', 'today', 'total', 'akun_dibuat', 'akun_aktif', 'akun_isi_formulir', 'akun_diterima', 'akun_ditolak', 'akun_mengundurkan_diri'));
        } elseif ($user->hasRole('akun_dibuat')) {
            $landing = Setting::where('type', 'landing')->pluck('value', 'name');
            $contacts = Setting::where('type', 'kontak')->get();
            $primaryWa = $contacts->skip(1)->first();
            return view('student.bridge', compact('user', 'landing', 'primaryWa'));
        } elseif ($user->hasRole('akun_aktif')) {
            return redirect()->route('student.create');
        } elseif ($user->hasRole(['akun_isi_formulir', 'akun_diterima', 'akun_ditolak', 'akun_mengundurkan_diri'])) {
            return redirect()->route('student.home', compact('user', 'pengumuman', 'today'));
        } elseif ($user->hasRole('akun_nonaktif')) {
            return redirect()->route('nonactive', compact('user', 'pengumuman', 'today'));
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

        $dateStr = $tanggal;
        $dateStr = preg_replace('/^[A-Za-z]+,\s*/', '', $dateStr);
        $dateStr = preg_replace('/\s*(WIB|WITA|WIT)\s*$/', '', $dateStr);
        $tanggalInggris = strtr($dateStr, $mapBulan);
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
