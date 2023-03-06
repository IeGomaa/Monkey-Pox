<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Town extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'name' => 'required|string|max:255',
            'city_id' => 'required|integer|exists:cities,id'
        ];
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function clinic(): HasOne
    {
        return $this->hasOne(Clinic::class, 'clinic_id', 'id');
    }

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class, 'town_id', 'id');
    }
}
