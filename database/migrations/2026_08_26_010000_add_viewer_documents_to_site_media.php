<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        foreach ([
            ['viewer.brochure.pdf', 'Brochure interactivo', 'assets/Brochure-Grupo-Indi.pdf'],
            ['viewer.ethics.pdf', 'Codigo de etica', 'assets/codigo-de-etica-y-conducta-2025.pdf'],
        ] as [$key, $label, $fallbackPath]) {
            DB::table('site_media')->updateOrInsert(
                ['key' => $key],
                [
                    'group' => 'Viewer',
                    'label' => $label,
                    'fallback_path' => $fallbackPath,
                    'path' => null,
                    'recommended_width' => null,
                    'recommended_height' => null,
                    'updated_at' => $now,
                    'created_at' => $now,
                ],
            );
        }
    }

    public function down(): void
    {
        DB::table('site_media')
            ->whereIn('key', ['viewer.brochure.pdf', 'viewer.ethics.pdf'])
            ->delete();
    }
};
