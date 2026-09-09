<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\Document;
use App\Models\Timeline;
use App\Models\CostCategory;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Exports\RegExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::with(['user', 'costCategory', 'document', 'payment']);

        if ($request->has('branch') && $request->branch !== 'all') {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('branch', $request->branch);
            });
        }

        $students = $query->get();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // cek apakah popup sudah pernah ditampilkan dalam sesi ini
        if (!session()->has('popup_shown')) {
            session(['popup_shown' => true]);
            $showPopup = true;
        } else {
            $showPopup = false;
        }

        $user = Auth::user();
        $jadwal = \App\Models\Setting::where('name', 'jadwal')->first();

        return view('student.form', compact('showPopup', 'user', 'jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** @var \App\Models\User */

        $user = Auth::user();
        $id = $user->id;

        try {
            // Validasi inputan form
            $validated = $request->validate([
                'full_name'   => 'required|string|max:255',
                'nick_name'   => 'required|string|max:100',
                'nik'         => 'required|string|max:20',
                'kk'          => 'required|string|max:20',
                'school_origin' => 'required|string|max:255',
                'school_address' => 'nullable|string|max:255',
                'school_nisn' => 'nullable|string|max:20',
                'gender'      => 'required|string',
                'place_birth' => 'required|string|max:100',
                'date_birth'  => 'required|date',
                'special_needs' => 'nullable|string',
                'is_hyperactive' => 'required|string|in:Ya,Tidak',
                'is_difficult_focus' => 'required|string|in:Ya,Tidak',
                'is_impulse_control' => 'required|string|in:Ya,Tidak',
                'is_extreme_tantrum' => 'required|string|in:Ya,Tidak',
                'needs_shadow_teacher' => 'required|string|in:Ya,Tidak',
                'saudara_kandung_di_sdit' => 'required|string|in:Ya,Tidak',
                'saudara_count' => 'nullable|integer|min:1|max:10',
                'saudara_names' => 'nullable|string|max:255',
                'living'      => 'nullable|string|max:100',
                'address'     => 'nullable|string',
                'rtrw'        => 'nullable|string|max:20',
                'postalcode'  => 'nullable|string|max:10',
                'desa'        => 'nullable|string|max:100',
                'kecamatan'   => 'nullable|string|max:100',
                'kota'        => 'nullable|string|max:100',
                'provinsi'    => 'nullable|string|max:100',
                'dad'         => 'nullable|string|max:255',
                'dad_edu'     => 'nullable|string|max:100',
                'dad_occupation' => 'nullable|string|max:100',
                'dad_income'  => 'nullable|string|max:100',
                'dad_phone'   => 'nullable|string|max:20',
                'mom'         => 'nullable|string|max:255',
                'mom_edu'     => 'nullable|string|max:100',
                'mom_occupation' => 'nullable|string|max:100',
                'mom_income'  => 'nullable|string|max:100',
                'mom_phone'   => 'nullable|string|max:20',
                'document'    => 'required|file|image|mimes:jpeg,jpg,png|max:1024',
            ]);

            // ✅ Ambil data dari validasi
            $data = $validated;
            $data['user_id'] = $id;
            $data['branch'] = $user->branch; // Copy branch dari User
            unset($data['document']);

            Student::updateOrCreate(
                ['user_id' => $id], // kondisi unik
                $data // data yang diupdate/isi
            );

            // Upload dokumen foto
            $file = $request->file('document');
            $file_name = $id . '-user-' . time() . '-' . $file->getClientOriginalName();
            $file->move(storage_path('app/public/photos'), $file_name);

            Document::create([
                'name'     => $request->input('full_name'),
                'type'     => 'upload_foto',
                'document' => 'photos/' . $file_name,
                'user_id'  => $id,
            ]);

            // Update role user
            $user->syncRoles('akun_isi_formulir');

            return redirect()->route('student.home')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            \Log::error('Student store failed for user ' . $id . ': ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $foto = Document::where('user_id', $student->user->id)->where('type', 'upload_foto')->first();
        // dd($foto);
        return view('admin.student.show', compact('student', 'foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'full_name'   => 'required|string|max:255',
            'nick_name'   => 'required|string|max:100',
            'nik'         => 'required|string|max:20',
            'kk'          => 'required|string|max:20',
            'school_origin' => 'required|string|max:255',
            'school_address' => 'nullable|string|max:255',
            'school_nisn' => 'nullable|string|max:20',
            'gender'      => 'required|string',
            'place_birth' => 'required|string|max:100',
            'date_birth'  => 'required|date',
            'address'     => 'nullable|string',
            'rtrw'        => 'nullable|string|max:20',
            'postalcode'  => 'nullable|string|max:10',
            'desa'        => 'nullable|string|max:100',
            'kecamatan'   => 'nullable|string|max:100',
            'kota'        => 'nullable|string|max:100',
            'provinsi'    => 'nullable|string|max:100',
            'special_needs' => 'nullable|string|max:255',
            'is_hyperactive' => 'nullable|string|in:Ya,Tidak',
            'is_difficult_focus' => 'nullable|string|in:Ya,Tidak',
            'is_impulse_control' => 'nullable|string|in:Ya,Tidak',
            'is_extreme_tantrum' => 'nullable|string|in:Ya,Tidak',
            'needs_shadow_teacher' => 'nullable|string|in:Ya,Tidak',
            'saudara_kandung_di_sdit' => 'nullable|string|in:Ya,Tidak',
            'saudara_count' => 'nullable|integer|min:1|max:10',
            'saudara_names' => 'nullable|string|max:255',
            'living'      => 'nullable|string|max:100',
            'dad'         => 'nullable|string|max:255',
            'dad_edu'     => 'nullable|string|max:100',
            'dad_occupation' => 'nullable|string|max:100',
            'dad_income'  => 'nullable|string|max:100',
            'dad_phone'   => 'nullable|string|max:20',
            'mom'         => 'nullable|string|max:255',
            'mom_edu'     => 'nullable|string|max:100',
            'mom_occupation' => 'nullable|string|max:100',
            'mom_income'  => 'nullable|string|max:100',
            'mom_phone'   => 'nullable|string|max:20',
        ]);

        $student->update($validated);
        return redirect()->route('student.index');
    }

    // update cost-reg
    public function update_cost(Request $request, Student $student)
    {
        $validated = $request->validate([
            'cost_category_id' => 'nullable|exists:cost_categories,id',
        ]);

        $student->update($validated);
        return redirect()->route('set.reg');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $documents = Document::where('user_id', $student->user_id)
            ->where('type', 'upload_foto')
            ->first();

        if ($documents) {
            $filePath = storage_path('app/public/' . $documents->document);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $documents->delete();
        }

        $student->delete();
        return redirect()->route('student.index');
    }

    // all student
    public function studentall()
    {
        $students = Student::with(['user', 'costCategory'])->get();
        return view('admin.student.all', compact('students'));
    }

    //export student
    public function exportstudent()
    {
        return Excel::download(new StudentExport, 'pendaftar.xls');
    }

    //export re-registrasi
    public function exportreg()
    {
        return Excel::download(new RegExport, 're-registrasi.xls');
    }

    // set biaya registrasi ulang
    public function setreg()
    {
        $students = Student::with(['user', 'costCategory'])->get();
        $costs = CostCategory::all();
        return view('admin.setcostreg.index', compact('students', 'costs'));
    }

    // handle card
    public function card()
    {
        $cards = Student::with(['user.document'])->get();
        return view('admin.student.card', compact('cards'));
    }

    private function formatToIndonesian(Carbon $date)
    {
        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember',
        ];

        // Format dengan hari, tanggal bulan tahun jam:menit
        $formatted = $date->format('l, d F Y H:i');

        // Ganti nama bulan Inggris ke Indonesia
        foreach ($months as $en => $id) {
            $formatted = str_replace($en, $id, $formatted);
        }

        // Ganti nama hari Inggris ke Indonesia
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];

        foreach ($days as $en => $id) {
            $formatted = str_replace($en, $id, $formatted);
        }

        return $formatted . ' WIB';
    }

    // undur diri
    public function undurdiri()
    {
        $users = User::role('akun_mengundurkan_diri')->get();
        return view('admin.student.undur', compact('users'));
    }
    // handle dari user //
    public function home()
    {
        $user = Auth::user();
        $timeline = Timeline::where('name', 'Pengumuman Hasil SPMB')->first();

        // Tanggal dari database sudah format Y-m-d H:i:s
        $tanggal_pengumuman = Carbon::parse($timeline->date);
        $today = Carbon::now();

        // Format untuk tampilan di view (ke format Indonesia)
        $pengumuman = $this->formatToIndonesian($tanggal_pengumuman);

        return view('student.home', compact('pengumuman', 'today', 'tanggal_pengumuman'));
    }

    public function studentprofil()
    {
        $id = Auth::user()->id;
        // dd($id);
        $student = Student::where('user_id', $id)->get()->first();
        $data = Document::where('user_id', $id)->where('type', 'upload_foto')->first();
        return view('student.profile', compact('student', 'data'));
    }

    public function studentcost()
    {
        $id = Auth::user()->id;
        $student = Student::where('user_id', $id)->get()->first();
        $date_cost = Timeline::where('name', 'Pembayaran Daftar Ulang')->first();
        // dd($students);
        return view('student.costreg', compact('student', 'date_cost'));
    }

    public function nonactive()
    {
        $user = Auth::user();
        return view('student.nonactive', compact('user'));
    }
}
