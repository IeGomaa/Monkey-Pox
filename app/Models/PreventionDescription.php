<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreventionDescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'prevention_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'description' => 'required|string',
            'prevention_id' => 'required|integer|exists:preventions,id'
        ];
    }

    public function prevention(): BelongsTo
    {
        return $this->belongsTo(Prevention::class, 'prevention_id', 'id');
    }
}
