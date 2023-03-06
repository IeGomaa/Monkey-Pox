<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalDiagnosis extends Model
{
    use HasFactory;
    protected $fillable = [
        'degree',
        'patient_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'degree' => 'required|string|max:255'
        ];
    }

    public static function deleteRule(): array
    {
        return [
            'id' => 'required|integer|exists:medical_diagnoses,id'
        ];
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
