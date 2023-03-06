<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'image' => 'required|image|mimes:png,jpg,webp,jpeg'
        ];
    }

    public function getImageAttribute($value): string
    {
        return 'uploaded/slider/' . $value;
    }
}
