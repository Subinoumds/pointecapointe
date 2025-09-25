<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'filename',
        'alt_text',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static function getActive()
    {
        return self::where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }
}
