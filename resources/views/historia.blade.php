@extends('layouts.app')

@section('title', 'Historia | INDI')

@php
    $historyFrameDirectory = public_path('imagenes_indi/HISTORIA INDI');
    $historyFrames = collect(\Illuminate\Support\Facades\File::files($historyFrameDirectory))->filter(function ($file) {
        return preg_match('/^H-INDI\d+\.png$/', $file->getFilename()) === 1;
    })->sortBy(function ($file) {
        preg_match('/(\d+)/', $file->getFilename(), $matches);

        return (int) ($matches[1] ?? 0);
    })->map(function ($file) {
        return asset('imagenes_indi/HISTORIA INDI/' . $file->getFilename());
    })->values();

    $milestones = [
        [
            'year' => '1979',
            'title' => \App\Support\CmsText::get('history.1979.title', 'INDI inicia operaciones'),
            'text' => \App\Support\CmsText::get('history.1979.text', 'Comenzamos construyendo hospitales y obras clave para el desarrollo del pais.'),
        ],
        [
            'year' => '1994',
            'title' => \App\Support\CmsText::get('history.1994.title', 'Centro Nacional de las Artes'),
            'text' => \App\Support\CmsText::get('history.1994.text', 'Participamos en la construccion de uno de los complejos culturales mas importantes de Mexico.'),
        ],
        [
            'year' => '2003',
            'title' => \App\Support\CmsText::get('history.2003.title', 'Sistema Cutzamala'),
            'text' => \App\Support\CmsText::get('history.2003.text', 'Impulsamos la modernizacion de infraestructura estrategica para el suministro de agua.'),
        ],
        [
            'year' => '2011',
            'title' => \App\Support\CmsText::get('history.2011.title', 'Nueva sede del Senado de la Republica'),
            'text' => \App\Support\CmsText::get('history.2011.text', 'Construimos una obra galardonada como la primera megaestructura en America Latina, con aparicion en Megaestructuras de National Geographic.'),
        ],
        [
            'year' => '2025',
            'title' => \App\Support\CmsText::get('history.2025.title', 'Tramo 3 del Tren Maya'),
            'text' => \App\Support\CmsText::get('history.2025.text', 'Participamos en la construccion del Tramo 3 del Tren Maya, fortaleciendo la infraestructura ferroviaria del sureste de Mexico.'),
        ],
    ];
@endphp

@section('content')
<section class="history-scroll-sequence" style="--history-milestones: {{ count($milestones) }};" data-history-frames='@json($historyFrames)'>
    <div class="history-sticky-stage">
        <div class="history-frame-wrap">
            <img
                id="historyFrameA"
                class="history-frame-image is-active"
                src="{{ $historyFrames->first() }}"
                alt="Historia de INDI"
                width="1920"
                height="1080"
                decoding="async"
                fetchpriority="high"
            >
            <img
                id="historyFrameB"
                class="history-frame-image"
                src="{{ $historyFrames->first() }}"
                alt=""
                width="1920"
                height="1080"
                decoding="async"
                aria-hidden="true"
            >
        </div>

        <div class="history-overlay"></div>

        <div class="history-fixed-copy">
            <span>{{ \App\Support\CmsText::get('history.eyebrow', 'INDI') }}</span>
            <h1>{{ \App\Support\CmsText::get('history.title', 'Historia') }}</h1>
        </div>

        <div class="history-progress" aria-hidden="true">
            <span id="historyProgressBar"></span>
        </div>
    </div>

    <div class="history-copy-track">
        @foreach($milestones as $milestone)
            <article class="history-milestone">
                <span>{{ $milestone['year'] }}</span>
                <h2>{{ $milestone['title'] }}</h2>
                <p>{{ $milestone['text'] }}</p>
            </article>
        @endforeach
    </div>
</section>
@endsection
