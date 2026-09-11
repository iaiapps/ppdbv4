<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        // $user = Auth::user();
        // return view('student.upload_foto', compact('user'));
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
            'type' => 'required',
            'document' => 'required|file|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        //beri nama
        $file = $request->file('document');
        $file_name = $id . '-user-' . time() . '.' . $file->getClientOriginalExtension();

        // simpan di folder storage/app/public/photos
        $request->file('document')->move(storage_path('app/public/photos'), $file_name);

        //masukkan ke array validate
        $imgDocument['document'] = 'photos/' . $file_name;
        $imgDocument['user_id'] = $id;

        //simpan ke database
        Document::create($imgDocument);

        return redirect()->route('home')->with('success', 'Berhasil upload dokumen');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $validated = $request->validate([
            'user' => 'required|exists:users,id',
        ]);

        $data = Document::where('user_id', $validated['user'])->where('type', 'upload_pembayaran')->get();
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
    public function destroyDoc(Document $document)
    {
        $id = $document->user_id;
        $filePath = storage_path('app/public/' . $document->document);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $document->delete();
        return redirect()->route('document.show', ['user' => $id]);
    }

    public function destroyPhoto(Document $document)
    {
        $filePath = storage_path('app/public/' . $document->document);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $document->delete();
        return redirect()->route('student.index');
    }
}
