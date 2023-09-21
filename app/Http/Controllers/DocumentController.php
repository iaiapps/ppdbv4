<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //cek id
        $id = Auth::user()->id;

        //validate
        $imgDocument = $request->validate([
            'name' => 'required',
            'document' => 'mimes:jpeg,jpg,png|file|max:1024',
        ]);

        //beri nama
        $file = $request->file('document');
        $file_name = $id . '-user' . '-' . time() . '-' . $file->getClientOriginalName();

        // simpan di folder public
        // $request->file('file')->move(public_path('img-document'), $file_name); 

        // simpan di folder storage
        $request->file('document')->storeAs('public/img-document', $file_name);

        //masukkan ke array validate
        $imgDocument['document'] = $file_name;
        $imgDocument['user_id'] = $id;

        //simpan ke database
        Document::create($imgDocument);

        return redirect()->route('home')->with('success', 'Bukti pembayaran berhasil di upload');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Document $document)
    {
        $id = $request->user;
        $data = Document::where('user_id', $id)->get();
        return view('admin.user.document', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
