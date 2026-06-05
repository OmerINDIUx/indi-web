<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiamos los existentes para evitar duplicados
        Post::truncate();

        Post::create([
            'title' => 'DESCUBRΞ LΛ INGENIERÍΛ ΛTRÁS DΞ TRΛMO 3 Y 5 DΞL TRΞN MΛYΛ',
            'slug' => 'descubre-la-ingenieria-atras-de-tramo-3-y-5-del-tren-maya',
            'category' => 'ferroviario',
            'thumbnail' => null, // Usará por defecto el fallback si es null
            'content' => '<p>La construcción del Tren Maya representa uno de los proyectos ferroviarios más ambiciosos del siglo XXI en América Latina. INDI ha liderado de manera proactiva la ejecución técnica de los Tramos 3 y 5, integrando tecnología de precisión y estándares internacionales de ingeniería ferroviaria.</p>
            <p>El tendido de vías en terrenos kársticos representó un desafío sin precedentes. A través de estudios geofísicos tridimensionales y el uso de pilotes de cimentación profunda de hasta 35 metros, garantizamos la estabilidad absoluta de la vía sin afectar el ecosistema subterráneo de cenotes y ríos de la península de Yucatán.</p>
            <blockquote>"Nuestra meta de excelencia técnica nos impulsa a diseñar soluciones de infraestructura que transformen positivamente el futuro del transporte nacional de forma sostenible."</blockquote>
            <h2>INNOVΛCIÓN EN CΞNTRO DΞ CONTROL</h2>
            <p>Además de la obra civil, implementamos sistemas de señalización ERTMS Nivel 2 y un centro de monitoreo automatizado de alta frecuencia que controla el espaciamiento de trenes en tiempo real, garantizando los máximos estándares de seguridad y eficiencia operativa en el flujo de pasajeros y carga del país.</p>',
            'is_published' => true,
        ]);

        Post::create([
            'title' => 'DESCUBRΞ LΛ LOGÍSTICΛ DΞTRÁS DΞ UN ROMPΞOLΛS',
            'slug' => 'descubre-la-logistica-detras-de-un-rompeolas',
            'category' => 'maritimo',
            'thumbnail' => null,
            'content' => '<p>La construcción de infraestructura marítima representa uno de los desafíos más complejos de la ingeniería moderna. En INDI, hemos perfeccionado los procesos logísticos necesarios para la creación de rompeolas de gran escala, fundamentales para la protección de terminales portuarias y el desarrollo del comercio marítimo nacional.</p>
            <p>Un rompeolas no es simplemente una acumulación de rocas; es una estructura de precisión diseñada para disipar la energía de las olas y crear un ambiente seguro para la navegación. La logística de estas obras involucra la coordinación exacta entre canteras, transporte terrestre de materiales pesados y la colocación precisa mediante maquinaria especializada en el medio marino.</p>
            <blockquote>"La eficiencia logística y la exactitud en la colocación hidráulica son los pilares fundamentales que distinguen cada desarrollo portuario de INDI."</blockquote>
            <h2>INGΞNIΞRÍΛ DΞ PRΞCISIÓN MΛRÍTIMΛ</h2>
            <p>El proceso comienza con estudios batimétricos y de oleaje profundo que determinan la geometría exacta de la estructura. Cada bloque de concreto de alta densidad es monitoreado por GPS para garantizar su ubicación exacta bajo el agua, mitigando riesgos climáticos adversos en el entorno marino y preservando la biodiversidad local.</p>',
            'is_published' => true,
        ]);

        Post::create([
            'title' => 'TΞCNOLOGÍΛ INDI ΞN ΞL SURΞSTΞ MΞXICΛNO',
            'slug' => 'tecnologia-indi-en-el-sureste-mexicano',
            'category' => 'infraestructura',
            'thumbnail' => null,
            'content' => '<p>El desarrollo de infraestructura vial masiva ha encontrado un nuevo estándar de ejecución tecnológica en el sureste del país. INDI ha implementado metodologías BIM avanzadas y plantas dosificadoras automatizadas para garantizar pavimentos asfálticos y estructuras de concreto de durabilidad centenaria.</p>
            <p>Nuestros sistemas integrados permiten monitorear la compactación, temperatura y composición de las mezclas en tiempo real desde centros remotos, optimizando tiempos de entrega vial e incrementando la seguridad durante el transporte de millones de ciudadanos.</p>',
            'is_published' => true,
        ]);

        Post::create([
            'title' => 'NUΞVΛS DRΛGΛS DΞ SUCCIÓN DΞ ΛLTΛ CΛPΛCIDΛD',
            'slug' => 'nuevas-dragas-de-succion-de-alta-capacidad',
            'category' => 'maritimo',
            'thumbnail' => null,
            'content' => '<p>Para optimizar la capacidad operativa de los muelles e hidrovías nacionales, INDI ha incorporado modernos sistemas de dragado hidráulico de succión por arrastre. Esta maquinaria permite remover sedimentos a profundidades de hasta 30 metros con una eficiencia ecológica única.</p>
            <p>El uso de tecnologías con bajo impacto en la turbidez del agua garantiza que las actividades portuarias continúen su curso sin alterar los ecosistemas bentónicos de los puertos de Veracruz y Campeche.</p>',
            'is_published' => true,
        ]);
    }
}
