@extends('layouts.app')

@section('title', 'Historia | INDI')

@php
    $getHistoryFrames = function (string $directoryName) {
        $historyFrameDirectory = public_path('imagenes_indi/' . $directoryName);
        $cacheKey = 'history.frames.' . \Illuminate\Support\Str::slug($directoryName);

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
            'eyebrow' => 'INDI',
            'title' => 'Historia',
            'frames' => $getHistoryFrames('HISTORIA-INDI-1'),
            'milestones' => [
                [
                    'year' => '1979',
                    'title' => 'INDI inicia operaciones',
                    'text' => 'Comenzamos construyendo hospitales y obras clave para el desarrollo del país.',
                ],
                [
                    'year' => '1994',
                    'title' => 'Centro Nacional de las Artes',
                    'text' => 'Participamos en la construcción de uno de los complejos culturales más importantes de México.',
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
            ],
        ],
        [
            'eyebrow' => 'INDI',
            'title' => 'hISTORIA',
            'frames' => $getHistoryFrames('HISTORIA-INDI-2'),
            'milestones' => [
                [
                    'year' => '2011',
                    'title' => 'Mexibús',
                    'text' => 'Fuimos pioneros en el modelo operativo APP para sistemas BRT.',
                ],
                [
                    'year' => '2011',
                    'title' => 'Senado de la República',
                    'text' => 'Construimos la nueva sede del Senado de la República, obra galardonada como la primera megaestructura en América Latina y presentada en Megaestructuras de National Geographic.',
                ],
                [
                    'year' => '2017',
                    'title' => 'Circuito Exterior CDMX',
                    'text' => 'Asumimos la operación y el mantenimiento del Circuito Exterior CDMX.',
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
                    'year' => '2021',
                    'title' => 'Cablebús Línea 1',
                    'text' => 'Construimos y pusimos en marcha la primera línea del Cablebús en la Ciudad de México.',
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
            'text' => 'Abrimos oficinas en Naucalpan, Estado de México.',
        ],
        [
            'kicker' => 'Reconocimiento empresarial',
            'title' => '1987',
            'text' => 'Por primera vez, INDI figura entre las 500 empresas más importantes de México.',
        ],
        [
            'kicker' => 'Nueva etapa',
            'title' => '1993',
            'text' => 'Se crea Grupo INDI, que se consolida como uno de los principales constructores de puentes urbanos en la Ciudad de México.',
        ],
        [
            'kicker' => 'Consolidación nacional',
            'title' => '1997',
            'text' => 'Grupo INDI se convierte en una de las firmas de infraestructura más grandes de México.',
        ],
    ];
@endphp

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

@foreach($historySections as $index => $section)
    <section
        class="history-scroll-sequence"
        style="--history-milestones: {{ count($section['milestones']) }}; --history-scroll-factor: 1.8;"
        data-history-frames='@json($section['frames'])'
        @if($index === 1) data-history-last-text-frame="indi-historia240434" @endif
    >
        <div class="history-sticky-stage">
            <div class="history-loader" aria-live="polite" aria-label="Cargando historia">
                <div class="history-loader-mark">INDI</div>
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
                <span>{{ $section['eyebrow'] }}</span>
                <h1>{{ $section['title'] }}</h1>
            </div>

            <div class="history-progress" aria-hidden="true">
                <span></span>
            </div>
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
                <div class="history-text-track">
                    @foreach($historyTextBlocks as $block)
                        <article class="history-text-panel">
                            <span>{{ $block['kicker'] }}</span>
                            <h2>{{ $block['title'] }}</h2>
                            <p>{{ $block['text'] }}</p>
                        </article>
                    @endforeach
                </div>
                <div class="history-text-stage__progress" aria-hidden="true">
                    <span></span>
                </div>
            </div>
        </section>
    @endif
@endforeach
@endsection
