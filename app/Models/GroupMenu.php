<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMenu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price_per_person',
        'entrees',
        'plats',
        'desserts',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'entrees' => 'array',
        'plats' => 'array',
        'desserts' => 'array',
        'is_active' => 'boolean',
        'price_per_person' => 'decimal:2'
    ];

    // Méthode pour récupérer tous les menus de groupe actifs
    public static function getActive()
    {
        return self::where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }
}
