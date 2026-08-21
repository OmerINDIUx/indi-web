<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteMedia extends Model
{
    protected $table = 'site_media';

    protected $fillable = [
        'group',
        'key',
        'label',
        'fallback_path',
        'path',
        'recommended_width',
        'recommended_height',
    ];

    protected $casts = [
        'recommended_width' => 'integer',
        'recommended_height' => 'integer',
    ];

    public function getUrlAttribute(): string
    {
        if ($this->path) {
            return Storage::disk('public')->url($this->path);
        }

        return asset($this->fallback_path);
    }
}
