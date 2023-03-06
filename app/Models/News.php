<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'date',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,webp,jpeg',
            'date' => 'required|date',
            'description' => 'required|string'
        ];
    }

    public static function deleteRule(): array
    {
        return [
            'id' => 'required|integer|exists:news,id'
        ];
    }

    public function getImageAttribute($value): string
    {
        return 'uploaded/news/' . $value;
    }
}
