<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vaccine extends Model
{
    use HasFactory;
    protected $fillable = [
        'vaccine'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'vaccine' => 'required|string|max:255'
        ];
    }

    public function vaccineInformation(): HasOne
    {
        return $this->hasOne(VaccineInformation::class, 'vaccine_id', 'id');
    }
}
