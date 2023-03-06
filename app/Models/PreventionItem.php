<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreventionItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'item',
        'prevention_description_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'item' => 'required|string|max:255',
            'prevention_description_id' => 'required|integer|exists:prevention_descriptions,id'
        ];
    }

    public function prevention_description(): BelongsTo
    {
        return $this->belongsTo(PreventionDescription::class, 'prevention_description_id', 'id');
    }
}
