<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clinic extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'doctor_id',
        'town_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'location' => 'required|string|max:255',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'town_id' => 'required|integer|exists:towns,id'
        ];
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class, 'town_id', 'id');
    }

    public function clinicDetails(): HasMany
    {
        return $this->hasMany(ClinicDetail::class, 'clinic_id', 'id');
    }

    public function clinicPhones(): HasMany
    {
        return $this->hasMany(ClinicPhone::class, 'clinic_id', 'id');
    }
}
