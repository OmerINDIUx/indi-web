<?php

use App\Support\CmsText;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        DB::table('site_translations')->where('key', 'history.1979.title')->update([
            'key' => 'history.1977.title', 'label' => 'Historia: 1977 leyenda', 'updated_at' => $now,
        ]);
        DB::table('site_translations')->where('key', 'history.1979.text')->update([
            'key' => 'history.1977.text', 'label' => 'Historia: 1977 texto', 'updated_at' => $now,
        ]);
        DB::table('site_translations')->where('key', 'history.2011.title')->update([
            'key' => 'history.2010.title', 'label' => 'Historia: 2010 leyenda', 'updated_at' => $now,
        ]);
        DB::table('site_translations')->where('key', 'history.2011.text')->update([
            'key' => 'history.2010.text', 'label' => 'Historia: 2010 texto', 'updated_at' => $now,
        ]);

        $legends = [
            ['1980', 'Comenzamos construyendo hospitales y escuelas', 'We began by building hospitals and schools'],
            ['1989', 'Construcción de Torres Gemelas TSJ', 'Construction of TSJ Twin Towers'],
            ['2005', 'Segundo Piso del Periférico', 'Second Level of the Periférico'],
            ['2007', 'Terminal Portuaria de Michoacán', 'Michoacán Port Terminal'],
            ['2009', 'Puente de rodamiento aeronáutico ASUR Cancún', 'ASUR Cancún aircraft taxiway bridge'],
            ['2011', 'Mexibús', 'Mexibús'],
            ['2014', 'Tribunal Superior de Justicia', 'Superior Court of Justice'],
            ['2018', 'Terminal de Contenedores del Puerto de Veracruz', 'Veracruz Port Container Terminal'],
            ['2019', 'Puerto de Manzanillo', 'Port of Manzanillo'],
            ['2021-2024', 'Cablebús Línea 1 y 3', 'Cablebús Lines 1 and 3'],
            ['2023', 'Rompeolas de Salina Cruz, Oaxaca', 'Salina Cruz Breakwater, Oaxaca'],
            ['2024', 'Tramo 5 Sur del Tren Maya', 'Maya Train Section 5 South'],
        ];

        foreach ($legends as [$year, $spanish, $english]) {
            DB::table('site_translations')->insertOrIgnore([
                'group' => 'Historia',
                'key' => "history.{$year}.title",
                'label' => "Historia: año {$year} leyenda",
                'text_es' => $spanish,
                'text_en' => $english,
                'is_multiline' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        CmsText::clearCache();
    }

    public function down(): void
    {
        // Se conservan los textos capturados por el administrador.
        CmsText::clearCache();
    }
};
