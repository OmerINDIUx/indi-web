<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $stats = [
            ['home.stats.years.number', 'Inicio: anos cifra', '+50', '+50'],
            ['home.stats.cities.number', 'Inicio: ciudades cifra', '+25', '+25'],
            ['home.stats.projects.number', 'Inicio: proyectos cifra', '+325', '+325'],
            ['home.stats.families.number', 'Inicio: familias INDI cifra', '+1500', '+1500'],
        ];

        foreach ($stats as [$key, $label, $textEs, $textEn]) {
            DB::table('site_translations')->updateOrInsert(
                ['key' => $key],
                [
                    'group' => 'General',
                    'label' => $label,
                    'text_es' => $textEs,
                    'text_en' => $textEn,
                    'is_multiline' => false,
                    'updated_at' => $now,
                    'created_at' => $now,
                ]
            );
        }

        DB::table('site_translations')
            ->whereIn('key', [
                'home.stats.years.title',
                'home.stats.years.text',
                'home.stats.cities.title',
                'home.stats.cities.text',
                'home.stats.projects.title',
                'home.stats.projects.text',
                'home.stats.families.title',
                'home.stats.families.text',
            ])
            ->update(['group' => 'General', 'updated_at' => $now]);

        Cache::forget('cms_site_translations');
    }

    public function down(): void
    {
        DB::table('site_translations')
            ->whereIn('key', [
                'home.stats.years.number',
                'home.stats.cities.number',
                'home.stats.projects.number',
                'home.stats.families.number',
            ])
            ->delete();

        DB::table('site_translations')
            ->whereIn('key', [
                'home.stats.years.title',
                'home.stats.years.text',
                'home.stats.cities.title',
                'home.stats.cities.text',
                'home.stats.projects.title',
                'home.stats.projects.text',
                'home.stats.families.title',
                'home.stats.families.text',
            ])
            ->update(['group' => 'Inicio', 'updated_at' => now()]);

        Cache::forget('cms_site_translations');
    }
};
