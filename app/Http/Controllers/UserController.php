<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['student', 'document', 'roles'])->where('name', '!=', 'admin')->get();
        return view('admin.user.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email_number' => 'required|string|max:255',
        ]);

        $user->update($validated);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    // helper
    public function resetpass(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        User::where('id', $validated['id'])->update(['password' => Hash::make('password')]);
        return redirect()->route('user.index')->with('msg', 'Password berhasil direset ke: password');
    }

    public function deleteAll(Request $request)
    {
        if ($request->input('key') === 'DELETE') {
            DB::transaction(function () {
                $users = User::with(['student', 'document', 'roles'])->where('name', '!=', 'admin')->get();
                foreach ($users as $user) {
                    // Hapus file fisik dari storage
                    foreach ($user->document as $doc) {
                        $filePath = storage_path('app/public/' . $doc->document);
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                    }
                    $user->student()->delete();
                    $user->document()->delete();
                    $user->roles()->detach();
                    $user->delete();
                }
                // Hapus file dan record dokumen yang tersisa (orphan)
                $orphanDocs = DB::table('documents')->get();
                foreach ($orphanDocs as $doc) {
                    $filePath = storage_path('app/public/' . $doc->document);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
                DB::table('documents')->delete();
            });
            return redirect()->route('setting.index')->with('msg', 'Berhasil menghapus data');
        } else {
            return redirect()->route('setting.index')->with('msg', 'Data tidak dihapus');
        }
    }

    public function nonactiveaccount()
    {
        $users = User::role('akun_nonaktif')->get();
        return view('admin.user.nonactive', compact('users'));
    }

    public function all()
    {
        $users = User::with(['student', 'roles'])->where('name', '!=', 'admin')->get();
        return view('admin.user.all', compact('users'));
    }
}
