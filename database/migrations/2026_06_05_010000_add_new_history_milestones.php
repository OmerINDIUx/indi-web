<?php

use App\Support\CmsText;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $rows = [
            ['Historia', 'history.2011.title', 'Historia: 2011 titulo', 'Nueva sede del Senado de la Republica', 'New Senate of the Republic headquarters', false],
            ['Historia', 'history.2011.text', 'Historia: 2011 texto', 'Construimos una obra galardonada como la primera megaestructura en America Latina, con aparicion en Megaestructuras de National Geographic.', 'We built an award-winning project recognized as the first megastructure in Latin America, with an appearance on National Geographic MegaStructures.', true],
            ['Historia', 'history.2025.title', 'Historia: 2025 titulo', 'Tramo 3 del Tren Maya', 'Maya Train Section 3', false],
            ['Historia', 'history.2025.text', 'Historia: 2025 texto', 'Participamos en la construccion del Tramo 3 del Tren Maya, fortaleciendo la infraestructura ferroviaria del sureste de Mexico.', 'We participated in the construction of Section 3 of the Maya Train, strengthening railway infrastructure in southeast Mexico.', true],
        ];

        DB::table('site_translations')->insertOrIgnore(array_map(function (array $row) use ($now) {
            return [
                'group' => $row[0],
                'key' => $row[1],
                'label' => $row[2],
                'text_es' => $row[3],
                'text_en' => $row[4],
                'is_multiline' => $row[5],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $rows));

        CmsText::clearCache();
    }

    public function down(): void
    {
        DB::table('site_translations')
            ->whereIn('key', [
                'history.2011.title',
                'history.2011.text',
                'history.2025.title',
                'history.2025.text',
            ])
            ->delete();

        CmsText::clearCache();
    }
};
