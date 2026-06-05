<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $rows = [
            ['General', 'nav.history', 'Menu: Historia', 'HISTORIA', 'HISTORY', false],
            ['Historia', 'history.eyebrow', 'Historia: etiqueta', 'INDI', 'INDI', false],
            ['Historia', 'history.title', 'Historia: titulo', 'Historia', 'History', false],
            ['Historia', 'history.1979.title', 'Historia: 1979 titulo', 'INDI inicia operaciones', 'INDI begins operations', false],
            ['Historia', 'history.1979.text', 'Historia: 1979 texto', 'Comenzamos construyendo hospitales y obras clave para el desarrollo del pais.', 'We began by building hospitals and key works for the country development.', true],
            ['Historia', 'history.1994.title', 'Historia: 1994 titulo', 'Centro Nacional de las Artes', 'National Center for the Arts', false],
            ['Historia', 'history.1994.text', 'Historia: 1994 texto', 'Participamos en la construccion de uno de los complejos culturales mas importantes de Mexico.', 'We participated in the construction of one of Mexico most important cultural complexes.', true],
            ['Historia', 'history.2003.title', 'Historia: 2003 titulo', 'Sistema Cutzamala', 'Cutzamala System', false],
            ['Historia', 'history.2003.text', 'Historia: 2003 texto', 'Impulsamos la modernizacion de infraestructura estrategica para el suministro de agua.', 'We supported the modernization of strategic infrastructure for water supply.', true],
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
    }

    public function down(): void
    {
        DB::table('site_translations')
            ->whereIn('key', [
                'nav.history',
                'history.eyebrow',
                'history.title',
                'history.1979.title',
                'history.1979.text',
                'history.1994.title',
                'history.1994.text',
                'history.2003.title',
                'history.2003.text',
            ])
            ->delete();
    }
};
