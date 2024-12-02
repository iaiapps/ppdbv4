<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $name = Student::where('id', '=', $id)->first();
        return view('admin.payment.create', compact('id', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // pembayaran
        $id = $request->student_id;
        $data = $request->all();
        Payment::create($data);
        // return redirect()->route('payment.showall', $id);

        // upload bukti pembayaran
        //validate
        $imgDocument = $request->validate([
            'type' => 'required',
            'document' => 'required|file|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        //beri nama
        $file = $request->file('document');
        $file_name = $id . '-du' . '-' . time() . '-' . $file->getClientOriginalName();

        // simpan di folder public
        // dd($request->file());
        $request->file('document')->move(public_path('img-document'), $file_name);

        //masukkan ke array validate
        $imgDocument['name'] = $request->name_pembayaran;
        $imgDocument['document'] = $file_name;
        $imgDocument['user_id'] = $id;

        //simpan ke database
        Document::create($imgDocument);

        // kembali ke payment
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
        // dd($payment);
        $payment->delete();
        return redirect()->back();
    }

    // untuk melihat pembayaran
    public function paymentshow($id)
    {
        $student = Student::where('id', '=', $id)->first();
        $payments = Payment::where('student_id', '=', $id)->get();

        $bukti = Document::where('name', $student->full_name)->where('type', 'upload_bukti_daftar_ulang')->get();
        // dd($bukti);
        return view('admin.payment.show', compact('payments', 'id', 'student', 'bukti'));
    }

    // untuk melihat bukti pembayaran
    public function paymentphoto($id)
    {
        $document = Document::where('id', $id)->first();
        return view('admin.payment.paymentphoto', compact('document'));
    }
}
