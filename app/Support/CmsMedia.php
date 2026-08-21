<?php

namespace App\Support;

use App\Models\SiteMedia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Throwable;

class CmsMedia
{
    public static function url(string $key, string $fallbackPath): string
    {
        try {
            $media = Cache::rememberForever('cms_site_media', function () {
                return SiteMedia::query()->get()->keyBy('key');
            })->get($key);
        } catch (Throwable) {
            return asset($fallbackPath);
        }

        if (! $media || blank($media->path)) {
            return asset($fallbackPath);
        }

        return Storage::disk('public')->url($media->path);
    }

    public static function clearCache(): void
    {
        Cache::forget('cms_site_media');
    }
}
