<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complication extends Model
{
    use HasFactory;

    protected $fillable = [
        'item'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'item' => 'required|string|max:255'
        ];
    }
}
