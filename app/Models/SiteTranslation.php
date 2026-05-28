<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteTranslation extends Model
{
    protected $fillable = [
        'group',
        'key',
        'label',
        'text_es',
        'text_en',
        'is_multiline',
    ];

    protected $casts = [
        'is_multiline' => 'boolean',
    ];
}
