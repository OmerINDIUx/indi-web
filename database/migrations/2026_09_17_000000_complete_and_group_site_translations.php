<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        DB::table('site_translations')
            ->whereIn('key', [
                'home.stats.years.number',
                'home.stats.years.title',
                'home.stats.years.text',
                'home.stats.cities.number',
                'home.stats.cities.title',
                'home.stats.cities.text',
                'home.stats.projects.number',
                'home.stats.projects.title',
                'home.stats.projects.text',
                'home.stats.families.number',
                'home.stats.families.title',
                'home.stats.families.text',
            ])
            ->update(['group' => 'Inicio', 'updated_at' => $now]);

        $rows = [
            ['Inicio', 'home.projects.featured_title', 'Inicio: titulo de proyectos destacados', 'PROYECTOS DESTACADOS', 'FEATURED PROJECTS'],
            ['Inicio', 'home.projects.view_all', 'Inicio: enlace a todos los proyectos', 'CONOCE TODOS NUESTROS PROYECTOS', 'DISCOVER ALL OUR PROJECTS'],
            ['Proyectos', 'projects.search_button', 'Proyectos: boton buscar', 'BUSCAR', 'SEARCH'],
        ];

        foreach ($rows as [$group, $key, $label, $textEs, $textEn]) {
            DB::table('site_translations')->updateOrInsert(
                ['key' => $key],
                [
                    'group' => $group,
                    'label' => $label,
                    'text_es' => $textEs,
                    'text_en' => $textEn,
                    'is_multiline' => false,
                    'updated_at' => $now,
                    'created_at' => $now,
                ]
            );
        }

        Cache::forget('cms_site_translations');
    }

    public function down(): void
    {
        DB::table('site_translations')
            ->whereIn('key', [
                'home.stats.years.number',
                'home.stats.years.title',
                'home.stats.years.text',
                'home.stats.cities.number',
                'home.stats.cities.title',
                'home.stats.cities.text',
                'home.stats.projects.number',
                'home.stats.projects.title',
                'home.stats.projects.text',
                'home.stats.families.number',
                'home.stats.families.title',
                'home.stats.families.text',
            ])
            ->update(['group' => 'General', 'updated_at' => now()]);

        DB::table('site_translations')
            ->whereIn('key', [
                'home.projects.featured_title',
                'home.projects.view_all',
                'projects.search_button',
            ])
            ->delete();

        Cache::forget('cms_site_translations');
    }
};
