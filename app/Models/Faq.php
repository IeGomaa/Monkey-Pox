<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static function createRule(): array
    {
        return [
            'question' => 'required|string|unique:faqs,question',
            'answer' => 'required|string'
        ];
    }
}
