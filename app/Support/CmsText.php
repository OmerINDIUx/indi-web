<?php

namespace App\Support;

use App\Models\SiteTranslation;
use Illuminate\Support\Facades\Cache;
use Throwable;

class CmsText
{
    public static function get(string $key, string $fallback = ''): string
    {
        $locale = app()->getLocale() === 'en' ? 'en' : 'es';
        $column = 'text_' . $locale;

        try {
            $translations = Cache::rememberForever('cms_site_translations', function () {
                return SiteTranslation::query()
                    ->get()
                    ->keyBy('key');
            });
        } catch (Throwable) {
            return $fallback;
        }

        $translation = $translations->get($key);

        if (! $translation) {
            return $fallback;
        }

        $text = $translation->{$column};

        return filled($text) ? $text : ($translation->text_es ?: $fallback);
    }

    public static function clearCache(): void
    {
        Cache::forget('cms_site_translations');
    }
}
