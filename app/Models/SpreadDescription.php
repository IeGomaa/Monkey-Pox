<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpreadDescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'spread_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'description' => 'required|string',
            'spread_id' => 'required|integer|exists:spreads,id'
        ];
    }

    public function spread(): BelongsTo
    {
        return $this->belongsTo(Spread::class, 'spread_id', 'id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(SpreadItem::class, 'spread_description_id', 'id');
    }
}
