<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get file URL via secure route
     */
    public function getFileUrlAttribute(): string
    {
        if (!$this->document) {
            return '';
        }

        $parts = explode('/', $this->document);
        $folder = $parts[0] ?? 'photos';
        $filename = $parts[1] ?? $this->document;

        return route('file.serve', ['folder' => $folder, 'filename' => $filename]);
    }
}
