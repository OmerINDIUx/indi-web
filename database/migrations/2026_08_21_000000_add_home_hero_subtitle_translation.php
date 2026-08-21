<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('site_translations')->updateOrInsert(
            ['key' => 'home.hero.subtitle'],
            [
                'group' => 'Inicio',
                'label' => 'Inicio: subtitulo del hero',
                'text_es' => 'MÁS DE 50 AÑOS CONSTRUYENDO MÉXICO',
                'text_en' => 'MORE THAN 50 YEARS BUILDING MEXICO',
                'is_multiline' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Cache::forget('cms_site_translations');
    }

    public function down(): void
    {
        DB::table('site_translations')
            ->where('key', 'home.hero.subtitle')
            ->delete();

        Cache::forget('cms_site_translations');
    }
};
