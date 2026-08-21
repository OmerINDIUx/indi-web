<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_media', function (Blueprint $table) {
            $table->id();
            $table->string('group', 80);
            $table->string('key', 160)->unique();
            $table->string('label');
            $table->string('fallback_path');
            $table->string('path')->nullable();
            $table->unsignedSmallInteger('recommended_width')->nullable();
            $table->unsignedSmallInteger('recommended_height')->nullable();
            $table->timestamps();
        });

        $now = now();
        $rows = [
            ['Inicio', 'home.unit.maritime.image', 'Unidad Maritimo', 'imagenes_indi/Maritimo.png', 1600, 1200],
            ['Inicio', 'home.unit.infrastructure.image', 'Unidad Infraestructura', 'imagenes_indi/Infraestructura.png', 1600, 1200],
            ['Inicio', 'home.unit.construction.image', 'Unidad Construccion', 'imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg', 1600, 1200],
            ['Inicio', 'home.unit.railway.image', 'Unidad Ferroviaria', 'imagenes_indi/Ferroviario.png', 1600, 1200],
            ['Prensa', 'press.hero.image', 'Portada de Prensa', 'imagenes_indi/Maritimo/a-terminal-portuaria-puerto-veracruz - copia.webp', 2000, 1100],
            ['Social', 'social.foundation.logo', 'Logo Fundacion MMC', 'imagenes_social/Fundación_MMC-Logo.png', 1200, 800],
            ['Historia', 'history.1975.image', 'Historia 1975', 'imagenes_indi/imagenes_historia/Oficinas naucalpan.JPG', 1600, 1000],
            ['Historia', 'history.1987.image', 'Historia 1987', 'imagenes_indi/imagenes_historia/1987.jpeg', 1600, 1000],
            ['Historia', 'history.1993.image', 'Historia 1993', 'imagenes_indi/imagenes_historia/1993.JPG', 1600, 1000],
            ['Historia', 'history.1997.image', 'Historia 1997', 'imagenes_indi/imagenes_historia/1997.JPG', 1600, 1000],
            ['Historia', 'history.2002.image', 'Historia 2002', 'imagenes_indi/imagenes_historia/2002.JPG', 1600, 1000],
            ['Historia', 'history.2008.image', 'Historia 2008', 'imagenes_indi/imagenes_historia/2008.JPG', 1600, 1000],
            ['Historia', 'history.2012.image', 'Historia 2012', 'imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg', 1600, 1000],
            ['Historia', 'history.2015.image', 'Historia 2015', 'imagenes_indi/imagenes_historia/2015.png', 1600, 1000],
            ['Historia', 'history.2017.image', 'Historia 2017', 'imagenes_indi/imagenes_historia/Rompeolas campeche 2017.jpg', 1600, 1000],
            ['Historia', 'history.2020.image', 'Historia 2020', 'imagenes_indi/imagenes_historia/2020.jpeg', 1600, 1000],
            ['Historia', 'history.2025.image', 'Historia 2025', 'imagenes_indi/imagenes_historia/2025.png', 1600, 1000],
        ];

        DB::table('site_media')->insert(array_map(fn ($row) => [
            'group' => $row[0], 'key' => $row[1], 'label' => $row[2],
            'fallback_path' => $row[3], 'recommended_width' => $row[4],
            'recommended_height' => $row[5], 'created_at' => $now, 'updated_at' => $now,
        ], $rows));
    }

    public function down(): void
    {
        Schema::dropIfExists('site_media');
    }
};
