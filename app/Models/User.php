<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email_number',
        'password',
        'branch',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function getBranchLabelAttribute(): string
    {
        return match ($this->branch) {
            'sditharum_1' => 'SDIT HARAPAN UMAT JEMBER',
            'sditharum_2' => 'HARAPAN UMAT - Nature Bilingual School',
            default => 'Belum Ditentukan',
        };
    }

    public function getBranchShortAttribute(): string
    {
        return match ($this->branch) {
            'sditharum_1' => 'Harum 1',
            'sditharum_2' => 'Harum 2',
            default => '-',
        };
    }

    public function getBranchBadgeClassAttribute(): string
    {
        return match ($this->branch) {
            'sditharum_1' => 'success',
            'sditharum_2' => 'info',
            default => 'secondary',
        };
    }
}
