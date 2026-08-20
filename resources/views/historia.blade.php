@extends('layouts.app')

@section('title', 'Historia | INDI')

@php
    $getHistoryFrames = function (string $directoryName) {
        $historyFrameDirectory = public_path('imagenes_indi/' . $directoryName);
        $cacheKey = 'history.frames.v6.' . \Illuminate\Support\Str::slug($directoryName);

        return \Illuminate\Support\Facades\Cache::remember($cacheKey, now()->addDay(), function () use ($historyFrameDirectory, $directoryName) {
            if (! \Illuminate\Support\Facades\File::isDirectory($historyFrameDirectory)) {
                return collect();
            }

            return collect(\Illuminate\Support\Facades\File::files($historyFrameDirectory))->filter(function ($file) {
                return in_array(strtolower($file->getExtension()), ['gif', 'jpg', 'jpeg', 'png', 'webp'], true);
            })->sortBy(function ($file) {
                preg_match('/(\d+)/', $file->getFilename(), $matches);

                return (int) ($matches[1] ?? 0);
            })->map(function ($file) use ($directoryName) {
                return asset('imagenes_indi/' . $directoryName . '/' . $file->getFilename());
            })->values();
        });
    };

    $historySections = [
        [
            'title' => 'Historia',
            'frames' => $getHistoryFrames('HISTORIA-INDI-1'),
            'milestones' => [
                [
                    'year' => '1997',
                    'title' => 'INDI inicia operaciones',
                    'text' => '',
                ],
                [
                    'year' => '1980',
                    'title' => 'Comenzamos construyendo hospitales y escuelas',
                    'text' => '',
                ],
                [
                    'year' => '1989',
                    'title' => 'Construcción de Torres Gemelas TSJ',
                    'text' => '',
                ],
                [
                    'year' => '1994',
                    'title' => 'Construcción del Centro Nacional de las Artes',
                    'text' => '',
                ],
                [
                    'year' => '2003',
                    'title' => 'Sistema Cutzamala',
                    'text' => 'Impulsamos la modernización de infraestructura estratégica para el suministro de agua.',
                ],
                [
                    'year' => '2005',
                    'title' => 'Segundo Piso del Periférico',
                    'text' => 'Participamos en la construcción del Segundo Piso del Periférico en la Ciudad de México.',
                ],
                [
                    'year' => '2007',
                    'title' => 'Terminal Portuaria de Michoacán',
                    'text' => 'Construimos la Terminal Portuaria de Michoacán, fortaleciendo la infraestructura logística del país.',
                ],
                [
                    'year' => '2009',
                    'title' => 'Puente de rodamiento aeronáutico ASUR Cancún',
                    'text' => 'Construimos el puente de rodamiento aeronáutico de ASUR Cancún.',
                ],
            ],
        ],
        [
            'title' => 'hISTORIA',
            'frames' => $getHistoryFrames('HISTORIA-INDI-2'),
            'milestones' => [
                [
                     'year' => '2010',
                    'title' => 'Senado de la República',
                    'text' => 'Construimos la nueva sede del Senado de la República, obra galardonada como la primera megaestructura en América Latina y presentada en Megaestructuras de National Geographic.',
                ],

                [

                'year' => '2011',
                    'title' => 'Mexibús',
                    'text' => 'Fuimos pioneros en el modelo operativo APP para sistemas BRT.',
                                    ],


                [
                    'year' => '2014',
                    'title' => 'Tribunal Superior de Justicia',
                    'text' => 'Construimos el Tribunal Superior de Justicia de la Ciudad de México.',
                ],
                [
                    'year' => '2018',
                    'title' => 'Terminal de Contenedores del Puerto de Veracruz',
                    'text' => 'Realizamos la ampliación de la Terminal de Contenedores del Puerto de Veracruz.',
                ],
                [
                    'year' => '2019',
                    'title' => 'Puerto de Manzanillo',
                    'text' => 'Participamos en la construcción de las fases 2 y 3 del Puerto de Manzanillo.',
                ],
                [
                    'year' => '2021-2024',
                    'title' => 'Cablebús Línea 1 y 3',
                    'text' => 'Construimos y pusimos en marcha las líneas 1 y 3 del Cablebús en la Ciudad de México.',
                ],
                [
                    'year' => '2023',
                    'title' => 'Rompeolas de Salina Cruz, Oaxaca',
                    'text' => 'Construimos el rompeolas más grande de Latinoamérica en Salina Cruz, Oaxaca.',
                ],
                [
                    'year' => '2024',
                    'title' => 'Tramo 5 Sur del Tren Maya',
                    'text' => 'Concluimos la construcción del Tramo 5 Sur del Tren Maya, entre Puerto Aventuras y Akumal.',
                ],
            ],
        ],
    ];

    $historyTextBlocks = [
        [
            'kicker' => 'Crecimiento institucional',
            'title' => '1981',
            'image' => asset('imagenes_indi/Construccion/universidad-de-la-ciudad-de-mexico - copia.webp'),
            'text' => 'Abrimos oficinas en Naucalpan, Estado de México.',
        ],
        [
            'kicker' => 'Reconocimiento empresarial',
            'title' => '1987',
            'image' => asset('imagenes_indi/Construccion/tribunal-superior-de-justicia-cdmx - copia.webp'),
            'text' => 'Por primera vez, INDI figura entre las 500 empresas más importantes de México.',
        ],
        [
            'kicker' => 'Nueva etapa',
            'title' => '1993',
            'image' => asset('imagenes_indi/Construccion/centro-nacional-de-las-artes - copia.webp'),
            'text' => 'Se crea Grupo INDI, que se consolida como uno de los principales constructores de puentes urbanos en la Ciudad de México.',
        ],
        [
            'kicker' => 'Consolidación nacional',
            'title' => '1997',
            'image' => asset('imagenes_indi/Construccion/Sistema-Cutzamala - copia.webp'),
            'text' => 'Grupo INDI se convierte en una de las firmas de infraestructura más grandes de México.',
        ],
    ];

    $historyTextBlocksAfterVideo = [
        [
            'kicker' => 'Innovación en infraestructura',
            'title' => '2002',
            'image' => asset('imagenes_indi/Construccion/Segundo-Piso-Periferico-San-Jeronimo-Las-Flores - copia.webp'),
            'text' => 'Pioneros en la construcción de autopistas elevadas.',
        ],
        [
            'kicker' => 'Innovación constructiva',
            'title' => '2008',
            'image' => asset('imagenes_indi/Construccion/Cimentacion-Espacio-Condesa - copia.webp'),
            'text' => 'Pioneros en la implementación de cimentación Top Down, así como en edificaciones inteligentes en México.',
        ],
        [
            'kicker' => 'Reconocimiento internacional',
            'title' => '2012',
            'image' => asset('imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg'),
            'text' => 'Ganadores del premio Deal Of the Year en la categoría Latin America Social Infrastructure.',
        ],
        [
            'kicker' => 'Certificaciones',
            'title' => '2015',
            'image' => asset('imagenes_indi/infraestructura/Tren-Interurbano-Mexico-Toluca - copia.webp'),
            'text' => 'Certificación ISO 9000, 14000 y 18000.',
        ],
        [
            'kicker' => 'Infraestructura portuaria',
            'title' => '2017',
            'image' => asset('imagenes_indi/Maritimo/morro-rompeolas-isla-del-carmen - copia.webp'),
            'text' => 'Rompeolas en Isla del Carmen, Campeche.',
        ],
        [
            'kicker' => 'Expansión internacional',
            'title' => '2020',
            'image' => asset('imagenes_indi/infraestructura/primer-cablebus-cdmx-l1-estacion - copia.webp'),
            'text' => 'INDI USA.',
        ],
        [
            'kicker' => 'Responsabilidad social',
            'title' => '2025',
            'image' => asset('assets/social/support.png'),
            'text' => 'Obtención de Distintivo Empresa Socialmente Responsable.',
        ],
    ];@endphp

@section('content')
<aside
    class="history-orientation-notice"
    id="historyOrientationNotice"
    role="dialog"
    aria-modal="false"
    aria-labelledby="historyOrientationTitle"
    hidden
>
    <button
        class="history-orientation-notice__close"
        id="historyOrientationNoticeClose"
        type="button"
        aria-label="Cerrar recomendación"
    >
        &times;
    </button>
    <div class="history-orientation-notice__icon" aria-hidden="true">
        <span></span>
    </div>
    <div>
        <strong id="historyOrientationTitle">Mejor experiencia</strong>
        <p>Para una mejor experiencia, te recomendamos voltear tu dispositivo móvil.</p>
    </div>
</aside>

<div class="history-page-progress" aria-hidden="true">
    <span></span>
</div>

@foreach($historySections as $index => $section)
    <section
        class="history-scroll-sequence"
        style="--history-milestones: {{ count($section['milestones']) }}; --history-scroll-factor: 1.8;"
        data-history-frames='@json($section['frames'])'
        data-history-last-text-frame="{{ $index === 0 ? 'part1424' : 'part2428' }}"
    >
        <div class="history-sticky-stage">
            <div class="history-loader" aria-live="polite" aria-label="Cargando historia">
                <div class="history-loader-line">
                    <span></span>
                </div>
                <div class="history-loader-meta">
                    <span>Cargando historia</span>
                    <strong>0%</strong>
                </div>
            </div>

            <div class="history-frame-wrap">
                <img
                    class="history-frame-image is-active"
                    src="{{ $section['frames']->first() }}"
                    alt="Historia de INDI"
                    width="1920"
                    height="1080"
                    decoding="async"
                    @if($index === 0) fetchpriority="high" @endif
                >
                <img
                    class="history-frame-image"
                    src="{{ $section['frames']->first() }}"
                    alt=""
                    width="1920"
                    height="1080"
                    decoding="async"
                    aria-hidden="true"
                >
            </div>

            <div class="history-overlay"></div>

            <div class="history-fixed-copy">
                @if(! empty($section['eyebrow']))
                    <span>{{ $section['eyebrow'] }}</span>
                @endif
                <h1>{{ $section['title'] }}</h1>
            </div>

            @if($index === 0)
                <div class="history-scroll-cue is-loading" aria-hidden="true">
                    <span>Scrollea para descubrir más</span>
                    <img
                        src="{{ asset('imagenes_indi/scroll.gif') }}"
                        alt=""
                        width="180"
                        height="150"
                    >
                </div>
            @endif
        </div>

        <div class="history-copy-track">
            @foreach($section['milestones'] as $milestone)
                <article class="history-milestone" style="--history-milestone-index: {{ $loop->index }};">
                    <span>{{ $milestone['year'] }}</span>
                    <h2>{{ $milestone['title'] }}</h2>
                    <p>{{ $milestone['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    @if($index === 0)
        <section class="history-text-sequence" style="--history-text-count: {{ count($historyTextBlocks) }};" aria-label="Historia sin fotografias">
            <div class="history-text-stage">
                <div class="history-text-heading">
                    <h2>Otra parte de la historia</h2>
                </div>
                <div class="history-text-track">
                    @foreach($historyTextBlocks as $block)
                        <article class="history-text-panel {{ ! empty($block['image']) ? 'history-text-panel--with-image' : 'history-text-panel--copy-only' }}">
                            @if(! empty($block['image']))
                                <figure class="history-text-panel__media">
                                    <img src="{{ $block['image'] }}" alt="{{ $block['title'] }}" loading="lazy" decoding="async">
                                </figure>
                            @endif
                            <div class="history-text-panel__copy">
                                <span>{{ $block['kicker'] }}</span>
                                <h2>{{ $block['title'] }}</h2>
                                <p>{{ $block['text'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($index === 1)
        <section class="history-text-sequence" style="--history-text-count: {{ count($historyTextBlocksAfterVideo) }};" aria-label="Continuación de la historia">
            <div class="history-text-stage">
                <div class="history-text-heading">
                    <!-- <span>INDI</span> -->
                    <h2>Continuación de la historia</h2>
                </div>
                <div class="history-text-track">
                    @foreach($historyTextBlocksAfterVideo as $block)
                        <article class="history-text-panel {{ ! empty($block['image']) ? 'history-text-panel--with-image' : 'history-text-panel--copy-only' }}">
                            @if(! empty($block['image']))
                                <figure class="history-text-panel__media">
                                    <img src="{{ $block['image'] }}" alt="{{ $block['title'] }}" loading="lazy" decoding="async">
                                </figure>
                            @endif
                            <div class="history-text-panel__copy">
                                <span>{{ $block['kicker'] }}</span>
                                <h2>{{ $block['title'] }}</h2>
                                <p>{{ $block['text'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endforeach
@endsection
