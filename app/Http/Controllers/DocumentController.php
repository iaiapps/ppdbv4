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
        // ini upload foto ijazah
        $user = Auth::user();
        // dd($user);
        return view('student.upload_foto', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
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
        $file_name = $id . '-user' . '-' . time() . '-' . $file->getClientOriginalName();

        // simpan di folder public
        // dd($request->file());
        $request->file('document')->move(public_path('img-document'), $file_name);

        // simpan di folder storage
        // $request->file('document')->storeAs('public/img-document', $file_name);

        //masukkan ke array validate
        $imgDocument['document'] = $file_name;
        $imgDocument['user_id'] = $id;

        //simpan ke database
        Document::create($imgDocument);

        if ($request->type == 'upload_foto') {
            return redirect()->route('student.home')->with('success', 'Berhasil upload dokumen');
        } elseif ($request->type == 'upload_pembayaran') {
            return redirect()->route('home')->with('success', 'Berhasil upload dokumen');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Document $document)
    {
        $id = $request->user;
        $data = Document::where('user_id', $id)->where('type', 'upload_pembayaran')->get();
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
        // ini delete file di public folder
        File::delete('img-document/' . $document->document);
        $document->delete();
        return redirect()->route('user.index');
    }

    public function destroyPhoto(Document $document)
    {
        $document->delete();
        return redirect()->route('student.index');
    }
}
