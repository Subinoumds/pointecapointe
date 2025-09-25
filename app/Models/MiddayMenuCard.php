<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiddayMenuCard extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'items',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    public static function getActive()
    {
        return self::where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }
}
