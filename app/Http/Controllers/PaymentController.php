<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['user', 'payment'])->get();
        return view('admin.payment.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $name = Student::where('id', '=', $id)->first();
        return view('admin.payment.create', compact('id', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data pembayaran
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string|max:255',
            'payment_from' => 'required|string|max:255',
            'date' => 'required|string|max:100',
            'value' => 'required|integer|min:0',
            'payment_says' => 'required|string|max:255',
            'name_pembayaran' => 'required|string|max:255',
            'type' => 'required',
            'document' => 'required|file|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        // Simpan data pembayaran
        $id = $validated['student_id'];
        Payment::create([
            'student_id' => $validated['student_id'],
            'name' => $validated['name'],
            'payment_from' => $validated['payment_from'],
            'date' => $validated['date'],
            'value' => $validated['value'],
            'payment_says' => $validated['payment_says'],
        ]);

        // Upload bukti pembayaran
        $file = $request->file('document');
        $file_name = $id . '-du' . '-' . time() . '-' . $file->getClientOriginalName();
        $file->move(storage_path('app/public/payments'), $file_name);

        // Get user_id dari student
        $student = Student::find($id);
        $user_id = $student ? $student->user_id : Auth::id();

        Document::create([
            'name' => $validated['name_pembayaran'],
            'type' => 'upload_bukti_daftar_ulang',
            'document' => 'payments/' . $file_name,
            'user_id' => $user_id,
        ]);

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
    public function destroy(Payment $payment, Request $request)
    {
        // Find document by payment relationship, not user input
        $doc = Document::where('name', $payment->name)
            ->where('type', 'upload_bukti_daftar_ulang')
            ->where('user_id', $payment->student->user_id)
            ->first();

        if ($doc) {
            $filePath = storage_path('app/public/' . $doc->document);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $doc->delete();
        }

        $payment->delete();
        return redirect()->back();
    }

    // untuk melihat pembayaran
    public function paymentshow($id)
    {
        $student = Student::findOrFail($id);
        $payments = Payment::where('student_id', '=', $id)->get();

        $bukti = Document::where('user_id', $student->user_id)->where('type', 'upload_bukti_daftar_ulang')->get();
        return view('admin.payment.show', compact('payments', 'id', 'student', 'bukti'));
    }

    // untuk melihat bukti pembayaran
    public function paymentphoto($id)
    {
        $document = Document::where('id', $id)
            ->where('type', 'upload_bukti_daftar_ulang')
            ->firstOrFail();
        return view('admin.payment.paymentphoto', compact('document'));
    }

    // melihat semua pembayaran
    public function paymentall()
    {
        $students = Student::with(['user'])->get();
        $payments = Payment::with(['student'])->get();
        return view('admin.payment.all', compact('payments', 'students'));
    }
}
