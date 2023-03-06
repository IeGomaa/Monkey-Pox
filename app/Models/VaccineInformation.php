<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VaccineInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'vaccine_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'description' => 'required|string',
            'vaccine_id' => 'required|integer|exists:vaccines,id|unique:vaccine_id,id'
        ];
    }

    public function vaccine(): BelongsTo
    {
        return $this->belongsTo(Vaccine::class, 'vaccine_id', 'id');
    }
}
