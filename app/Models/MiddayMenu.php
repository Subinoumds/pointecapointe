<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiddayMenu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    // Méthode pour récupérer tous les menus du midi actifs
    public static function getActive()
    {
        return self::where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }
}
