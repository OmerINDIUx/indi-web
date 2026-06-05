<?php

use App\Support\CmsText;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('site_translations')
            ->where('key', 'history.eyebrow')
            ->update([
                'text_es' => 'INDI',
                'text_en' => 'INDI',
                'updated_at' => now(),
            ]);

        CmsText::clearCache();
    }

    public function down(): void
    {
        DB::table('site_translations')
            ->where('key', 'history.eyebrow')
            ->update([
                'text_es' => 'Grupo INDI',
                'text_en' => 'Grupo INDI',
                'updated_at' => now(),
            ]);

        CmsText::clearCache();
    }
};
