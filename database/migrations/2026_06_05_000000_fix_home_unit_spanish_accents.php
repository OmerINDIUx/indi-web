<?php

use App\Support\CmsText;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $translations = [
            'home.unit.maritime.title' => 'INDI MARÍTIMO',
            'home.unit.maritime.text' => 'Dominio técnico en ingeniería portuaria, escolleras monumentales y obras de dragado. Integramos tecnologías de vanguardia para superar las dinámicas costeras y conectar a México con el mundo.',
            'home.unit.infrastructure.text' => 'Desarrollo de sistemas de movilidad urbana y transporte masivo de alta precisión técnica, resolviendo retos complejos para conectar y transformar las metrópolis.',
            'home.unit.construction.title' => 'INDI CONSTRUCCIÓN',
            'home.unit.construction.text' => 'Especialistas en ingeniería civil de alta complejidad y cimentación profunda. Ejecutamos obras icónicas y monumentales, garantizando la máxima integridad estructural e innovación arquitectónica.',
            'home.unit.railway.text' => 'Ingeniería avanzada para sistemas de transporte ferroviario de carga y pasajeros a gran escala. Trazamos y construimos rutas resilientes que impulsan la competitividad logística a nivel nacional.',
        ];

        foreach ($translations as $key => $text) {
            DB::table('site_translations')
                ->where('key', $key)
                ->update(['text_es' => $text]);
        }

        CmsText::clearCache();
    }

    public function down(): void
    {
        $translations = [
            'home.unit.maritime.title' => 'INDI MARITIMO',
            'home.unit.maritime.text' => 'Dominio tecnico en ingenieria portuaria, escolleras monumentales y obras de dragado. Integramos tecnologias de vanguardia para superar las dinamicas costeras y conectar a Mexico con el mundo.',
            'home.unit.infrastructure.text' => 'Desarrollo de sistemas de movilidad urbana y transporte masivo de alta precision tecnica, resolviendo retos complejos para conectar y transformar las metropolis.',
            'home.unit.construction.title' => 'INDI CONSTRUCCION',
            'home.unit.construction.text' => 'Especialistas en ingenieria civil de alta complejidad y cimentacion profunda. Ejecutamos obras iconicas y monumentales, garantizando la maxima integridad estructural e innovacion arquitectonica.',
            'home.unit.railway.text' => 'Ingenieria avanzada para sistemas de transporte ferroviario de carga y pasajeros a gran escala. Trazamos y construimos rutas resilientes que impulsan la competitividad logistica a nivel nacional.',
        ];

        foreach ($translations as $key => $text) {
            DB::table('site_translations')
                ->where('key', $key)
                ->update(['text_es' => $text]);
        }

        CmsText::clearCache();
    }
};
