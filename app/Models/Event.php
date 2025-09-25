<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'type',
        'images',
        'is_active'
    ];

    protected $casts = [
        'event_date' => 'date',
        'images' => 'array',
        'is_active' => 'boolean',
    ];

    // Scope pour les événements à venir
    public function scopeUpcoming($query)
    {
        return $query->where('type', 'upcoming')->where('is_active', true);
    }

    // Scope pour les événements passés
    public function scopePast($query)
    {
        return $query->where('type', 'past')->where('is_active', true);
    }

    // Accessor pour formater la date
    public function getFormattedDateAttribute()
    {
        return $this->event_date->format('d/m/Y');
    }

}
