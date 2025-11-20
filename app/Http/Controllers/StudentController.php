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
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
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

        return view('student.form', compact('showPopup'));
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
                'gender'      => 'required|string',
                'place_birth' => 'required|string|max:100',
                'date_birth'  => 'required|date',
                // dst field student...
                'document'    => 'required|file|image|mimes:jpeg,jpg,png|max:1024',
            ]);

            // ✅ Ambil semua data request
            $data = $request->all();
            unset($data['document']); // jangan masukkan file ke tabel student
            $data['user_id'] = $id;

            Student::updateOrCreate(
                ['user_id' => $id], // kondisi unik
                $data // data yang diupdate/isi
            );

            // Upload dokumen foto
            $file = $request->file('document');
            $file_name = $id . '-user-' . time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('img-document'), $file_name);

            Document::create([
                'name'     => $request->input('full_name'),
                'type'     => 'upload_foto',
                'document' => $file_name,
                'user_id'  => $id,
            ]);

            // Update role user
            $user->syncRoles('akun_isi_formulir');

            return redirect()->route('student.home')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return back()->with('error', 'Ada formulir yang belum terisi ');
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
        // dd($request->all());
        $student->update($request->all());
        return redirect()->route('student.index');
        // return redirect()->route('set.reg');
    }

    // update cost-reg
    public function update_cost(Request $request, Student $student)
    {
        // dd($request->all());
        $student->update($request->all());
        // return redirect()->route('student.index');
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
        // dd($documents);
        $filePath = public_path('img-document/' . $documents->document);
        if (file_exists($filePath)) {
            unlink($filePath); // hapus file fisik
        }
        $documents->delete(); // hapus dari DB
        $student->delete();
        return redirect()->route('student.index');
    }

    // all student
    public function studentall()
    {
        $students = Student::all();
        return view('admin.student.all', compact('students'));
    }

    //export student
    public function exportstudent()
    {
        return Excel::download(new StudentExport, 'pendaftar.xls');
    }

    // set biaya registrasi ulang
    public function setreg()
    {
        $students  = Student::all();
        $costs = CostCategory::all();
        return view('admin.setcostreg.index', compact('students', 'costs'));
    }

    // handle card
    public function card()
    {
        $cards = Student::all();
        // dd($cards);
        return view('admin.student.card', compact('cards'));
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
        $id = $user->id;
        $tanggal = Timeline::where('name', 'Pengumuman Hasil SPMB')->first()->date;
        $pengumuman = $this->parseIndonesianDate($tanggal);
        $today = Carbon::now();
        return view('student.home', compact('pengumuman', 'today'));
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
        // dd($students);
        return view('student.costreg', compact('student'));
    }
}
