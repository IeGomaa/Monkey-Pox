<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'time_from',
        'time_to',
        'clinic_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'day' => 'required|string|max:255',
            'time_from' => 'required',
            'time_to' => 'required',
            'clinic_id' => 'required|integer|exists:clinics,id'
        ];
    }

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }
}
