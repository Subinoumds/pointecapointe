<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'glass_price',
        'bottle_price',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'glass_price' => 'decimal:2',
        'bottle_price' => 'decimal:2'
    ];

    // Méthode pour récupérer tous les vins actifs
    public static function getActive()
    {
        return self::select('id', 'name', 'image', 'glass_price', 'bottle_price', 'sort_order')
                   ->where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }
}
