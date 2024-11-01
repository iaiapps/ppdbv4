<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\CostCategory;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Document;

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
        return view('student.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** @var \App\Models\User */

        $user = Auth::user();
        $id = $user->id;

        $data = $request->all();
        $data['user_id'] = $id;

        Student::create($data);
        $user->syncRoles('akun_isi_formulir');
        return redirect()->route('student.home');
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
        //
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

    // handle dari user //
    public function home()
    {
        $user = Auth::user();
        $id = $user->id;
        $data = Document::where('user_id', $id)->where('type', 'upload_foto')->first();
        // dd($data);
        return view('student.home', compact('data'));
    }

    public function studentprofil()
    {
        $id = Auth::user()->id;
        // dd($id);
        $student = Student::where('user_id', $id)->get()->first();
        return view('student.profile', compact('student'));
    }

    public function studentcost()
    {
        $id = Auth::user()->id;
        $student = Student::where('user_id', $id)->get()->first();
        // dd($students);
        return view('student.costreg', compact('student'));
    }
}
