<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpreadItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'item',
        'spread_description_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'item' => 'required|string',
            'spread_description_id' => 'required|integer|exists:spread_descriptions,id'
        ];
    }

    public function spread_description(): BelongsTo
    {
        return $this->belongsTo(SpreadDescription::class, 'spread_description_id', 'id');
    }
}
