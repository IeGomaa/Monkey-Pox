<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'patient_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getImageAttribute($value): string
    {
        return 'uploaded/diagnosis/' . $value;
    }
}
