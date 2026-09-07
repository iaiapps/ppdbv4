<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileServeController extends Controller
{
    public function serve(Request $request, $folder, $filename)
    {
        // Sanitize folder and filename
        $folder = basename($folder);
        $filename = basename($filename);

        // Only allow valid folders
        if (!in_array($folder, ['photos', 'payments'])) {
            abort(404);
        }

        $path = storage_path('app/public/' . $folder . '/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        $docPath = $folder . '/' . $filename;
        $doc = Document::where('document', $docPath)->first();

        if (!$doc) {
            abort(404);
        }

        $user = Auth::user();
        if (!$user) {
            abort(401);
        }

        $isOwner = $doc->user_id === $user->id;
        $isAdmin = $user->hasRole('admin');

        if (!$isOwner && !$isAdmin) {
            abort(403);
        }

        return response()->file($path, [
            'Content-Type' => mime_content_type($path),
            'Content-Disposition' => 'inline',
            'Cache-Control' => 'private, max-age=3600',
        ]);
    }
}
