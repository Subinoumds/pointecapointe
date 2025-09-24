<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'items',
        'price',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    // Méthode pour récupérer les menus par type
    public static function getByType($type)
    {
        return self::where('type', $type)
                   ->where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }
}
