<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
        'filename',
        'path',
        'alt_text',
        'category',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Méthode pour récupérer les images par catégorie
    public static function getByCategory($category)
    {
        return self::where('category', $category)
                   ->where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }

    // Accessor pour l'URL complète de l'image
    public function getUrlAttribute()
    {
        return asset($this->path);
    }
}
