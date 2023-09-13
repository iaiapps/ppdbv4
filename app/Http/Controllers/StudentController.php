<?php

namespace App\Http\Controllers;

use App\Models\CostCategory;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // dd($request->all());
        $student->update($request->all());
        return redirect()->route('set.reg');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    // set biaya registrasi ulang
    public function setreg()
    {
        $students  = Student::all();
        $costs = CostCategory::all();
        return view('admin.setcostreg.index', compact('students', 'costs'));
    }

    // handle dari user //
    public function home()
    {
        return view('student.home');
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
