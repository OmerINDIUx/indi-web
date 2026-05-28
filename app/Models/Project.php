<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'address',
        'address_en',
        'category',
        'status',
        'home_order',
        'home_year',
        'home_time',
        'home_time_en',
        'description',
        'description_en',
        'latitude',
        'longitude',
        'marker_image',
    ];

    protected $casts = [
        'status' => 'boolean',
        'home_order' => 'integer',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function getLocalizedTitleAttribute(): string
    {
        return app()->getLocale() === 'en' && filled($this->title_en)
            ? $this->title_en
            : $this->title;
    }

    public function getLocalizedAddressAttribute(): string
    {
        return app()->getLocale() === 'en' && filled($this->address_en)
            ? $this->address_en
            : $this->address;
    }

    public function getLocalizedDescriptionAttribute(): ?string
    {
        return app()->getLocale() === 'en' && filled($this->description_en)
            ? $this->description_en
            : $this->description;
    }

    public function getLocalizedHomeTimeAttribute(): ?string
    {
        return app()->getLocale() === 'en' && filled($this->home_time_en)
            ? $this->home_time_en
            : $this->home_time;
    }
}
