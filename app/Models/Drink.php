<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Méthode pour récupérer les boissons par catégorie
    public static function getByCategory($category)
    {
        return self::select('id', 'name', 'description', 'category', 'sort_order')
                   ->where('category', $category)
                   ->where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }
}
