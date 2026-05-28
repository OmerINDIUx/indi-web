<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'slug_en',
        'content',
        'content_en',
        'thumbnail',
        'category',
        'is_published',
        'is_featured',
    ];

    public function getLocalizedTitleAttribute(): string
    {
        return app()->getLocale() === 'en' && filled($this->title_en)
            ? $this->title_en
            : $this->title;
    }

    public function getLocalizedSlugAttribute(): string
    {
        return app()->getLocale() === 'en' && filled($this->slug_en)
            ? $this->slug_en
            : $this->slug;
    }

    public function getLocalizedContentAttribute(): string
    {
        return app()->getLocale() === 'en' && filled($this->content_en)
            ? $this->content_en
            : $this->content;
    }
}
