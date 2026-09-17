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
                    'year' => \App\Support\CmsText::get('history.1977.year', '1977'),
                    'title' => \App\Support\CmsText::get('history.1977.title', 'INDI inicia operaciones'),
                    'text' => '',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.1980.year', '1980'),
                    'title' => \App\Support\CmsText::get('history.1980.title', 'Comenzamos construyendo hospitales y escuelas'),
                    'text' => '',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.1989.year', '1989'),
                    'title' => \App\Support\CmsText::get('history.1989.title', 'Construcción de Torres Gemelas TSJ'),
                    'text' => '',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.1994.year', '1994'),
                    'title' => \App\Support\CmsText::get('history.1994.title', 'Construcción del Centro Nacional de las Artes'),
                    'text' => '',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2003.year', '2003'),
                    'title' => \App\Support\CmsText::get('history.2003.title', 'Sistema Cutzamala'),
                    'text' => 'Impulsamos la modernización de infraestructura estratégica para el suministro de agua.',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2005.year', '2005'),
                    'title' => \App\Support\CmsText::get('history.2005.title', 'Segundo Piso del Periférico'),
                    'text' => 'Participamos en la construcción del Segundo Piso del Periférico en la Ciudad de México.',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2007.year', '2007'),
                    'title' => \App\Support\CmsText::get('history.2007.title', 'Terminal Portuaria de Michoacán'),
                    'text' => 'Construimos la Terminal Portuaria de Michoacán, fortaleciendo la infraestructura logística del país.',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2009.year', '2009'),
                    'title' => \App\Support\CmsText::get('history.2009.title', 'Puente de rodamiento aeronáutico ASUR Cancún'),
                    'text' => 'Construimos el puente de rodamiento aeronáutico de ASUR Cancún.',
                ],
            ],
        ],
        [
            'title' => 'hISTORIA',
            'frames' => $getHistoryFrames('HISTORIA-INDI-2'),
            'milestones' => [
                [
                     'year' => \App\Support\CmsText::get('history.2010.year', '2010'),
                    'title' => \App\Support\CmsText::get('history.2010.title', 'Senado de la República'),
                    'text' => 'Construimos la nueva sede del Senado de la República, obra galardonada como la primera megaestructura en América Latina y presentada en Megaestructuras de National Geographic.',
                ],

                [

                'year' => \App\Support\CmsText::get('history.2011.year', '2011'),
                    'title' => \App\Support\CmsText::get('history.2011.title', 'Mexibús'),
                    'text' => 'Fuimos pioneros en el modelo operativo APP para sistemas BRT.',
                                    ],


                [
                    'year' => \App\Support\CmsText::get('history.2014.year', '2014'),
                    'title' => \App\Support\CmsText::get('history.2014.title', 'Tribunal Superior de Justicia'),
                    'text' => 'Construimos el Tribunal Superior de Justicia de la Ciudad de México.',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2018.year', '2018'),
                    'title' => \App\Support\CmsText::get('history.2018.title', 'Terminal de Contenedores del Puerto de Veracruz'),
                    'text' => 'Realizamos la ampliación de la Terminal de Contenedores del Puerto de Veracruz.',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2019.year', '2019'),
                    'title' => \App\Support\CmsText::get('history.2019.title', 'Puerto de Manzanillo'),
                    'text' => 'Participamos en la construcción de las fases 2 y 3 del Puerto de Manzanillo.',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2021-2024.year', '2021-2024'),
                    'title' => \App\Support\CmsText::get('history.2021-2024.title', 'Cablebús Línea 1 y 3'),
                    'text' => 'Construimos y pusimos en marcha las líneas 1 y 3 del Cablebús en la Ciudad de México.',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2023.year', '2023'),
                    'title' => \App\Support\CmsText::get('history.2023.title', 'Rompeolas de Salina Cruz, Oaxaca'),
                    'text' => 'Construimos el rompeolas más grande de Latinoamérica en Salina Cruz, Oaxaca.',
                ],
                [
                    'year' => \App\Support\CmsText::get('history.2024.year', '2024'),
                    'title' => \App\Support\CmsText::get('history.2024.title', 'Tramo 5 Sur del Tren Maya'),
                    'text' => 'Concluimos la construcción del Tramo 5 Sur del Tren Maya, entre Puerto Aventuras y Akumal.',
                ],
            ],
        ],
    ];

    $historyTextBlocks = [
        [
            'kicker' => 'Crecimiento institucional',
            'title' => \App\Support\CmsText::get('history.1981.year', '1981'),
            'image' => \App\Support\CmsMedia::url('history.1975.image', 'imagenes_indi/imagenes_historia/Oficinas naucalpan.JPG'),
            'text' => 'Abrimos oficinas en Naucalpan, Estado de México.',
        ],
        [
            'kicker' => 'Reconocimiento empresarial',
            'title' => \App\Support\CmsText::get('history.1987.year', '1987'),
            'image' => \App\Support\CmsMedia::url('history.1987.image', 'imagenes_indi/imagenes_historia/1987.jpeg'),
            'text' => 'Por primera vez, INDI figura entre las 500 empresas más importantes de México.',
        ],
        [
            'kicker' => 'Nueva etapa',
            'title' => \App\Support\CmsText::get('history.1993.year', '1993'),
            'image' => \App\Support\CmsMedia::url('history.1993.image', 'imagenes_indi/imagenes_historia/1993.JPG'),
            'text' => 'Se crea Grupo INDI, que se consolida como uno de los principales constructores de puentes urbanos en la Ciudad de México.',
        ],
        [
            'kicker' => 'Consolidación nacional',
            'title' => \App\Support\CmsText::get('history.1997.year', '1997'),
            'image' => \App\Support\CmsMedia::url('history.1997.image', 'imagenes_indi/imagenes_historia/1997.JPG'),
            'text' => 'Grupo INDI se convierte en una de las firmas de infraestructura más grandes de México.',
        ],
    ];

    $historyTextBlocksAfterVideo = [
        [
            'kicker' => 'Innovación en infraestructura',
            'title' => \App\Support\CmsText::get('history.2002.year', '2002'),
            'image' => \App\Support\CmsMedia::url('history.2002.image', 'imagenes_indi/imagenes_historia/2002.JPG'),
            'text' => 'Pioneros en la construcción de autopistas elevadas.',
        ],
        [
            'kicker' => 'Innovación constructiva',
            'title' => \App\Support\CmsText::get('history.2008.year', '2008'),
            'image' => \App\Support\CmsMedia::url('history.2008.image', 'imagenes_indi/imagenes_historia/2008.JPG'),
            'text' => 'Pioneros en la implementación de cimentación Top Down, así como en edificaciones inteligentes en México.',
        ],
        [
            'kicker' => 'Reconocimiento internacional',
            'title' => \App\Support\CmsText::get('history.2012.year', '2012'),
            'image' => \App\Support\CmsMedia::url('history.2012.image', 'imagenes_indi/Construccion/senado-de-la-republica-panoramica - copia.jpg'),
            'text' => 'Ganadores del premio Deal Of the Year en la categoría Latin America Social Infrastructure.',
        ],
        [
            'kicker' => 'Certificaciones',
            'title' => \App\Support\CmsText::get('history.2015.year', '2015'),
            'image' => \App\Support\CmsMedia::url('history.2015.image', 'imagenes_indi/imagenes_historia/2015.png'),
            'text' => 'Certificación ISO 9000, 14000 y 18000.',
        ],
        [
            'kicker' => 'Infraestructura portuaria',
            'title' => \App\Support\CmsText::get('history.2017.year', '2017'),
            'image' => \App\Support\CmsMedia::url('history.2017.image', 'imagenes_indi/imagenes_historia/Rompeolas campeche 2017.jpg'),
            'text' => 'Rompeolas en Isla del Carmen, Campeche.',
        ],
        [
            'kicker' => 'Expansión internacional',
            'title' => \App\Support\CmsText::get('history.2020.year', '2020'),
            'image' => \App\Support\CmsMedia::url('history.2020.image', 'imagenes_indi/imagenes_historia/2020.jpeg'),
            'text' => 'INDI USA.',
        ],
        [
            'kicker' => 'Responsabilidad social',
            'title' => \App\Support\CmsText::get('history.2025.year', '2025'),
            'image' => \App\Support\CmsMedia::url('history.2025.image', 'imagenes_indi/imagenes_historia/2025.png'),
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
        style="--history-milestones: {{ count($section['milestones']) }}; --history-scroll-factor: 3.2;"
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
                    <span class="scroll-arrows history-scroll-arrows"><span></span><span></span></span>
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
        <section class="history-text-sequence" style="--history-text-count: {{ count($historyTextBlocks) }};" aria-label="Otra parte de la historia">
            <div class="history-text-stage">
                <div class="history-text-heading">
                    <h2>Otra parte de la historia</h2>
                </div>
                <div class="history-text-track">
                    @foreach($historyTextBlocks as $block)
                        <article class="history-text-panel {{ ! empty($block['image']) ? 'history-text-panel--with-image' : 'history-text-panel--copy-only' }}">
                            @if(! empty($block['image']))
                                <figure class="history-text-panel__media">
                                    <img src="{{ $block['image'] }}" alt="{{ $block['title'] }}" loading="eager" decoding="async">
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
                                    <img src="{{ $block['image'] }}" alt="{{ $block['title'] }}" loading="eager" decoding="async">
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
