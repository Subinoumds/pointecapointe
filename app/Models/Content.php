<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'key',
        'title',
        'content',
        'type',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Méthode pour récupérer un contenu par sa clé
    public static function getByKey($key, $default = '')
    {
        $content = self::where('key', $key)->where('is_active', true)->first();
        return $content ? $content->content : $default;
    }
}
