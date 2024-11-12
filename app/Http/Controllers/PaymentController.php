<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.payment.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('admin.payment.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->student_id;
        $data = $request->all();
        Payment::create($data);
        return redirect()->route('payment.showall', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return view('admin.payment.print', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    // untuk melihat pembayaran
    public function paymentshow($id)
    {
        $student = Student::where('id', '=', $id)->first();
        $payments = Payment::where('student_id', '=', $id)->get();
        return view('admin.payment.show', compact('payments', 'id', 'student'));
    }
}
