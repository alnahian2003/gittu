<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'stars_count',
        'topics',
        'owner_name',
        'owner_avatar',
        'owner_url',
        'owner_type',
    ];

    protected $casts = [
        'topics' => 'array',
    ];

    protected function starsCount(): Attribute
    {
        return Attribute::make(get: fn (int $value) => number_format($value));
    }
    protected function description(): Attribute
    {
        return Attribute::make(get: fn (string $value) => str($value)->limit());
    }
}
