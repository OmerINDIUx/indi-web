@extends('layouts.app')

@section('title', 'CMS - Traducciones')

@php
    $totalTranslations = $translations->flatten(1)->count();
    $missingEnglish = $translations->flatten(1)->filter(fn ($item) => blank($item->text_en))->count();
    $multilineTranslations = $translations->flatten(1)->where('is_multiline', true)->count();
    $completeTranslations = $totalTranslations - $missingEnglish;
    $translationPages = [
        'Navegacion' => ['name' => 'Menu principal', 'path' => '/', 'hint' => 'Enlaces visibles en todo el sitio'],
        'Inicio' => ['name' => 'Pagina de inicio', 'path' => '/', 'hint' => 'Portada, cifras, unidades y proyectos'],
        'Footer' => ['name' => 'Pie de pagina', 'path' => '/', 'hint' => 'Contacto y enlaces generales'],
        'Historia' => ['name' => 'Nuestra historia', 'path' => '/historia', 'hint' => 'Hitos y trayectoria de INDI'],
        'Negocios' => ['name' => 'Unidades de negocio', 'path' => '/negocios', 'hint' => 'Construccion, maritimo e infraestructura'],
        'Prensa' => ['name' => 'Prensa', 'path' => '/prensa', 'hint' => 'Noticias, filtros y mensajes'],
        'Proyectos' => ['name' => 'Proyectos', 'path' => '/proyectos', 'hint' => 'Buscador, fichas y estados'],
        'Social' => ['name' => 'Responsabilidad social', 'path' => '/social', 'hint' => 'Programas ambientales y sociales'],
        'Formularios' => ['name' => 'Formularios', 'path' => '/talento', 'hint' => 'Talento y canal de denuncias'],
        'Viewer' => ['name' => 'Visor de documentos', 'path' => '/brochure', 'hint' => 'Controles del visor PDF'],
    ];
@endphp

@push('styles')
<style>
body:has(.admin-translations-page){overflow:hidden;background:#eef2f7}
body:has(.admin-translations-page)>.logo-menu-wrapper,body:has(.admin-translations-page)>.indi-footer{display:none!important}
.admin-translations-page{min-height:100vh;padding:0;background:#eef2f7}
.admin-translations-shell{width:100%}
.admin-translations-hero{height:72px;display:grid;grid-template-columns:1fr auto;gap:1rem;align-items:center;margin:0;padding:0 1.25rem;color:#fff;background:#0b1220;border-bottom:1px solid rgba(255,255,255,.1)}
.admin-translations-hero>div:first-child{display:flex;align-items:center;gap:1rem}
.admin-translations-hero h1{margin:0;color:#fff;font-size:1.05rem;text-transform:none}
.admin-translations-hero p{margin:.2rem 0 0;color:#98a2b3;font-size:.74rem}
.admin-back-link{width:38px;height:38px;display:grid;place-items:center;margin:0;overflow:hidden;color:transparent;border:1px solid rgba(255,255,255,.18);border-radius:9px}
.admin-back-link:before{content:"\2190";margin:0;color:#fff;font-size:1rem}
.admin-translations-summary{border-color:rgba(255,255,255,.14);background:rgba(255,255,255,.06)}
.admin-translations-summary div{padding:.65rem .9rem;border-color:rgba(255,255,255,.12)}
.admin-translations-summary strong{color:#fff;font-size:1rem}
.admin-translations-summary span{color:#98a2b3;font-size:.58rem}
.admin-status-message,.admin-error-message{position:fixed;top:82px;left:50%;z-index:100;transform:translateX(-50%);margin:0;box-shadow:0 12px 30px rgba(15,23,42,.16)}
.admin-translations-workspace{height:calc(100vh - 72px);display:grid;grid-template-columns:245px minmax(360px,430px) minmax(440px,1fr);overflow:hidden}
.admin-translations-sidebar{position:static;z-index:auto;min-height:0;margin:0;border:0;border-right:1px solid #e2e8f0;border-radius:0;overflow:hidden}
.admin-toolbar{display:block;padding:1rem;border-bottom:1px solid #e2e8f0}
.admin-toolbar-header{display:block;margin-bottom:.8rem}
.admin-toolbar-header>div strong:before{content:"Paginas y secciones";display:block;font-size:.9rem}
.admin-toolbar-header>div strong{font-size:0}
#dirtyStateLabel{margin-top:.3rem;text-align:left;font-size:.68rem}
.admin-search-row{margin:.7rem 0}
.admin-filter-actions{display:block}
.admin-toggle-row{margin-bottom:.75rem}
.admin-toolbar-save{width:100%;min-height:38px;color:#fff;border-color:#0667f9;background:#0667f9}
.admin-group-nav{display:block;max-height:calc(100vh - 295px);padding:.55rem;overflow-y:auto;border:0}
.admin-group-link{min-height:54px;display:grid;grid-template-columns:1fr auto;align-items:center;padding:.65rem .75rem;border:0;border-radius:9px;color:#344054}
.admin-group-link:hover{background:#f6f8fb}
.admin-group-link.active{color:#0759d5;background:#edf5ff;box-shadow:inset 3px 0 #0667f9}
.admin-group-link span{min-width:0}
.admin-group-link span strong{display:block;color:inherit;font-size:.78rem}
.admin-group-link span small{display:block;margin-top:.2rem;overflow:hidden;color:#98a2b3;font-size:.62rem;text-overflow:ellipsis;white-space:nowrap}
.admin-translations-list{min-height:0;padding:.75rem;overflow-y:auto;border-right:1px solid #dbe3ed;background:#f8fafc}
.admin-translation-group{border:0;border-radius:0;background:transparent}
.admin-group-heading{position:sticky;top:-.75rem;z-index:3;margin:-.75rem -.75rem .7rem;padding:.9rem 1rem;background:rgba(255,255,255,.96);border-bottom:1px solid #e2e8f0;backdrop-filter:blur(10px)}
.admin-group-heading h2{font-size:1rem;text-transform:none}
.admin-translation-cards{display:block}
.admin-translation-card{margin-bottom:.65rem;padding:.85rem;border:1px solid #e2e8f0;border-radius:11px;background:#fff}
.admin-translation-card:hover,.admin-translation-card.is-previewed{border-color:#0667f9;box-shadow:0 0 0 3px rgba(6,103,249,.08)}
.admin-card-meta{margin-bottom:.65rem}
.admin-card-meta h3{font-size:.8rem;text-transform:none}
.admin-card-meta code{font-size:.58rem;color:#98a2b3}
.admin-language-grid{display:block}
.admin-language-grid label{margin-bottom:.65rem}
.admin-language-grid input,.admin-language-grid textarea{font-size:.78rem;border-radius:8px;background:#fbfcfe}
.admin-language-grid textarea{min-height:76px}
.admin-save-bar{position:sticky;bottom:0;margin:.75rem -.75rem -.75rem;padding:.75rem 1rem;border-width:1px 0 0;border-radius:0;box-shadow:0 -8px 20px rgba(15,23,42,.05)}
.admin-save-bar button{min-height:38px}
.translation-preview{min-width:0;min-height:0;display:flex;flex-direction:column;background:#dfe5ec}
.translation-preview-toolbar{min-height:56px;display:flex;justify-content:space-between;align-items:center;gap:1rem;padding:.65rem 1rem;background:#fff;border-bottom:1px solid #e2e8f0}
.translation-preview-title strong{display:block;font-size:.8rem}
.translation-preview-title span{display:block;margin-top:.15rem;color:#98a2b3;font-size:.64rem}
.translation-preview-actions{display:flex;gap:.35rem;flex-wrap:wrap;justify-content:flex-end}
.translation-preview-actions button,.translation-preview-actions a{min-height:34px;display:inline-flex;align-items:center;padding:0 .65rem;color:#475467;background:#fff;border:1px solid #d0d5dd;border-radius:8px;text-decoration:none;font:inherit;font-size:.65rem;font-weight:800;cursor:pointer}
.translation-preview-actions button.active{color:#fff;border-color:#111827;background:#111827}
.translation-preview-stage{min-height:0;flex:1;display:grid;place-items:center;padding:14px;overflow:auto;background-color:#dce3eb;background-image:radial-gradient(#b9c4d1 1px,transparent 1px);background-size:18px 18px}
.translation-preview-browser{width:100%;height:100%;overflow:hidden;border:1px solid #cbd5e1;border-radius:12px;background:#fff;box-shadow:0 18px 45px rgba(15,23,42,.16);transition:width .25s ease}
.translation-preview-browser.mobile{width:min(390px,100%)}
.translation-preview-browser iframe{display:block;width:100%;height:100%;border:0;background:#fff}
@media(max-width:1180px){
 body:has(.admin-translations-page){overflow:auto}
 .admin-translations-workspace{height:auto;grid-template-columns:220px minmax(350px,1fr)}
 .translation-preview{grid-column:1/-1;min-height:70vh}
 .admin-translations-sidebar,.admin-translations-list{min-height:650px}
}
@media(max-width:720px){
 .admin-translations-hero{height:auto;min-height:72px}
 .admin-translations-hero p,.admin-translations-summary{display:none}
 .admin-translations-workspace{grid-template-columns:1fr}
 .admin-translations-sidebar{min-height:auto}
 .admin-group-nav{display:flex;max-height:none;overflow-x:auto}
 .admin-group-link{min-width:max-content}
 .admin-group-link span small{display:none}
 .admin-translations-list{min-height:650px}
 .translation-preview{min-height:650px}
}
.page-admin-translations{margin:0!important;padding:0!important;overflow:hidden!important}
.page-admin-translations>.logo-menu-wrapper,.page-admin-translations>.indi-footer{display:none!important}
.page-admin-translations>main{position:fixed;inset:0;width:100%;height:100vh;margin:0!important;padding:0!important;overflow:hidden}
.page-admin-translations .admin-translations-page{position:absolute;inset:0;width:100%;height:100%;min-height:0;padding:0!important;margin:0!important}
.page-admin-translations .admin-translations-shell{height:100%}
.admin-translations-workspace{grid-template-columns:270px minmax(500px,560px) minmax(500px,1fr)}
.admin-toolbar{padding:.9rem}
.admin-toolbar-header{margin-bottom:.65rem}
.admin-content-tabs{display:grid;grid-template-columns:1fr 1fr;gap:4px;margin-bottom:.75rem;padding:4px;background:#edf1f6;border-radius:10px}
.admin-content-tabs button{min-height:36px;border:0;border-radius:7px;color:#667085;background:transparent;font:inherit;font-size:.72rem;font-weight:900;cursor:pointer}
.admin-content-tabs button.active{color:#fff;background:#0b1220;box-shadow:0 2px 8px rgba(15,23,42,.18)}
.admin-content-tabs button span{display:inline-grid;place-items:center;min-width:19px;height:19px;margin-left:.25rem;padding:0 .25rem;border-radius:99px;color:inherit;background:rgba(148,163,184,.18);font-size:.6rem}
.admin-group-nav{max-height:calc(100vh - 340px)}
.admin-translation-card{display:block!important;grid-template-columns:none!important;gap:0!important;padding:1rem!important}
.admin-card-meta{display:flex!important;justify-content:space-between;gap:1rem;margin-bottom:.8rem!important}
.admin-language-grid{display:grid!important;grid-template-columns:repeat(2,minmax(0,1fr))!important;gap:.75rem!important}
.admin-language-grid label{display:block!important;min-width:0;margin:0!important}
.admin-language-grid label>span{display:flex!important;min-height:24px;align-items:center;justify-content:space-between;gap:.5rem}
.admin-language-grid input,.admin-language-grid textarea{display:block;width:100%!important;min-width:0!important}
.admin-media-list{min-height:0;padding:.75rem;overflow-y:auto;border-right:1px solid #dbe3ed;background:#f8fafc}
.admin-media-list[hidden]{display:none!important}
.admin-media-group[hidden]{display:none!important}
.admin-media-cards{display:grid;gap:.8rem}
.admin-media-card{overflow:hidden;border:1px solid #dbe3ed;border-radius:12px;background:#fff}
.admin-media-preview{display:block;width:100%;height:190px;object-fit:cover;background:#e5e7eb}
.admin-media-body{padding:1rem}
.admin-media-title{display:flex;justify-content:space-between;gap:1rem;align-items:flex-start;margin-bottom:.8rem}
.admin-media-title h3{margin:0 0 .25rem;color:#172033;font-size:.86rem;text-transform:none}
.admin-media-title code{color:#98a2b3;font-size:.58rem}
.admin-media-title>span{max-width:145px;color:#667085;font-size:.63rem;line-height:1.35;text-align:right}
.admin-media-picker{display:block;position:relative}
.admin-media-picker input{position:absolute;inline-size:1px;block-size:1px;opacity:0}
.admin-media-picker span{min-height:42px;display:flex;align-items:center;justify-content:center;border:1px dashed #98a2b3;border-radius:8px;color:#0759d5;background:#f8fbff;font-size:.72rem;font-weight:900;cursor:pointer}
.admin-media-picker:hover span{border-color:#0667f9;background:#edf5ff}
.admin-compressor{margin-top:.8rem;padding:.8rem;border-radius:9px;background:#f4f7fb}
.admin-compressor[hidden]{display:none!important}
.admin-compressor-row{display:grid;grid-template-columns:110px 1fr;gap:.7rem;align-items:center;margin-bottom:.65rem}
.admin-compressor-row label{color:#475467;font-size:.68rem;font-weight:800}
.admin-compressor-row input,.admin-compressor-row select{width:100%}
.admin-compressor-row select{height:34px;border:1px solid #cbd5e1;border-radius:7px;background:#fff}
.admin-compression-result{margin:.65rem 0;color:#475467;font-size:.68rem;line-height:1.45}
.admin-media-upload{width:100%;min-height:40px;border:0;border-radius:8px;color:#fff;background:#0667f9;font:inherit;font-size:.72rem;font-weight:900;cursor:pointer}
.admin-media-upload:disabled{cursor:default;opacity:.45}
.admin-media-message{min-height:18px;margin-top:.45rem;color:#067647;font-size:.68rem;font-weight:800}
@media(max-width:1450px){
 .admin-translations-workspace{grid-template-columns:245px minmax(430px,500px) minmax(460px,1fr)}
}
@media(max-width:1050px){
 .page-admin-translations{overflow:auto!important}
 .page-admin-translations>main{position:static;height:auto;min-height:100vh;overflow:visible}
 .page-admin-translations .admin-translations-page{position:static;height:auto}
 .admin-translations-workspace{grid-template-columns:220px minmax(0,1fr)}
 .translation-preview{grid-column:1/-1;min-height:75vh}
}
</style>
@endpush

@section('content')
<div class="admin-translations-page">
    <div class="admin-translations-shell">
        <header class="admin-translations-hero">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="admin-back-link">Panel principal</a>
                <div>
                    <h1>Contenido del sitio</h1>
                    <p>Edita textos e imagenes mientras ves la pagina real.</p>
                </div>
            </div>
            <div class="admin-translations-summary" aria-label="Resumen de traducciones">
                <div>
                    <strong>{{ $totalTranslations }}</strong>
                    <span>Textos</span>
                </div>
                <div>
                    <strong>{{ $completeTranslations }}</strong>
                    <span>Completos</span>
                </div>
                <div>
                    <strong>{{ $missingEnglish }}</strong>
                    <span>Pendientes</span>
                </div>
            </div>
        </header>

        @if(session('success'))
            <div class="admin-status-message" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="admin-error-message" role="alert">
                Revisa los campos marcados. Hay informacion que no pudo guardarse.
            </div>
        @endif

        <form method="POST" action="{{ route('admin.traducciones.update') }}" id="translationsForm" class="admin-translations-workspace">
            @csrf
            @method('PUT')

            <aside class="admin-translations-sidebar" aria-label="Navegacion de secciones">
                <div class="admin-toolbar">
                    <div class="admin-toolbar-header">
                        <div>
                            <strong>Editar contenido</strong>
                            <span id="visibleTranslationsCount">{{ $totalTranslations }} textos visibles</span>
                        </div>
                        <span id="dirtyStateLabel">Sin cambios pendientes</span>
                    </div>
                    <div class="admin-content-tabs" aria-label="Tipo de contenido">
                        <button type="button" class="active" data-content-mode="texts">Textos</button>
                        <button type="button" data-content-mode="media">Imagenes <span>{{ $media->flatten(1)->count() }}</span></button>
                    </div>


                    <div class="admin-search-row">
                        <input id="translationSearch" type="search" placeholder="Clave, etiqueta o contenido" autocomplete="off">
                        <button type="button" id="clearTranslationSearch" aria-label="Limpiar busqueda">x</button>
                    </div>

                    <div class="admin-filter-actions">
                        <label class="admin-toggle-row">
                            <input type="checkbox" id="missingEnglishOnly">
                            <span>Solo pendientes de ingles</span>
                        </label>
                        <button type="submit" class="admin-toolbar-save">Guardar</button>
                    </div>
                </div>

                <nav class="admin-group-nav">
                    @foreach($translations as $group => $items)
                        @php
                            $page = $translationPages[$group] ?? ['name' => $group, 'path' => '/', 'hint' => 'Contenido general'];
                        @endphp
                        <a href="#group-{{ Str::slug($group) }}" class="admin-group-link {{ $loop->first ? 'active' : '' }}"
                           data-group-link="{{ Str::slug($group) }}" data-page-path="{{ $page['path'] }}" data-page-name="{{ $page['name'] }}">
                            <span>
                                <strong>{{ $page['name'] }}</strong>
                                <small>{{ $page['hint'] }}</small>
                            </span>
                            <strong>{{ $items->count() }}</strong>
                        </a>
                    @endforeach
                </nav>
            </aside>

            <div class="admin-translations-list" data-content-panel="texts">
                @foreach($translations as $group => $items)
                    <section id="group-{{ Str::slug($group) }}" class="admin-translation-group" data-group-section="{{ Str::slug($group) }}">
                        <div class="admin-group-heading">
                            <div>
                                <span>Seccion</span>
                                <h2>{{ $group }}</h2>
                            </div>
                            <strong>{{ $items->count() }} textos</strong>
                        </div>

                        <div class="admin-translation-cards">
                            @foreach($items as $translation)
                                @php
                                    $searchText = Str::lower($group . ' ' . $translation->label . ' ' . $translation->key . ' ' . $translation->text_es . ' ' . $translation->text_en);
                                @endphp
                                <article
                                    class="admin-translation-card"
                                    data-translation-card
                                    data-search="{{ $searchText }}"
                                    data-missing-en="{{ blank($translation->text_en) ? '1' : '0' }}"
                                >
                                    <div class="admin-card-meta">
                                        <div>
                                            <h3>{{ $translation->label }}</h3>
                                            <code>{{ $translation->key }}</code>
                                        </div>
                                        @if(blank($translation->text_en))
                                            <span class="admin-empty-badge">Pendiente EN</span>
                                        @endif
                                    </div>

                                    <div class="admin-language-grid">
                                        <label>
                                            <span>Espanol</span>
                                            @if($translation->is_multiline)
                                                <textarea name="translations[{{ $translation->id }}][text_es]" rows="5">{{ old("translations.{$translation->id}.text_es", $translation->text_es) }}</textarea>
                                            @else
                                                <input name="translations[{{ $translation->id }}][text_es]" value="{{ old("translations.{$translation->id}.text_es", $translation->text_es) }}">
                                            @endif
                                            @error("translations.{$translation->id}.text_es")
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </label>

                                        <label>
                                            <span>
                                                Ingles
                                                <button type="button" class="admin-copy-button" data-copy-es>Copiar ES</button>
                                            </span>
                                            @if($translation->is_multiline)
                                                <textarea name="translations[{{ $translation->id }}][text_en]" rows="5">{{ old("translations.{$translation->id}.text_en", $translation->text_en) }}</textarea>
                                            @else
                                                <input name="translations[{{ $translation->id }}][text_en]" value="{{ old("translations.{$translation->id}.text_en", $translation->text_en) }}">
                                            @endif
                                            @error("translations.{$translation->id}.text_en")
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </label>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endforeach

                <div class="admin-empty-results" id="translationEmptyState" hidden>
                    No hay textos con esos filtros.
                </div>

                <div class="admin-save-bar">
                    <span id="saveHint">Los cambios se aplican al guardar.</span>
                    <button type="submit" id="saveTranslationsButton">Guardar traducciones</button>
                </div>
            </div>
            <div class="admin-media-list" data-content-panel="media" hidden>
                @foreach($media as $group => $items)
                    <section class="admin-media-group" data-media-group-section="{{ Str::slug($group) }}" hidden>
                        <div class="admin-group-heading">
                            <div>
                                <span>Imagenes de</span>
                                <h2>{{ $translationPages[$group]['name'] ?? $group }}</h2>
                            </div>
                            <strong>{{ $items->count() }} imagenes</strong>
                        </div>
                        <div class="admin-media-cards">
                            @foreach($items as $image)
                                <article class="admin-media-card" data-media-card data-upload-url="{{ route('admin.traducciones.media.update', $image) }}">
                                    <img class="admin-media-preview" src="{{ $image->url }}" alt="{{ $image->label }}">
                                    <div class="admin-media-body">
                                        <div class="admin-media-title">
                                            <div><h3>{{ $image->label }}</h3><code>{{ $image->key }}</code></div>
                                            <span>{{ $image->recommended_width }} x {{ $image->recommended_height }} px recomendado</span>
                                        </div>
                                        <label class="admin-media-picker">
                                            <input type="file" accept="image/jpeg,image/png,image/webp" data-media-input>
                                            <span>Elegir nueva imagen</span>
                                        </label>
                                        <div class="admin-compressor" hidden data-compressor>
                                            <div class="admin-compressor-row">
                                                <label>Calidad <strong data-quality-value>82%</strong></label>
                                                <input type="range" min="55" max="95" value="82" data-quality>
                                            </div>
                                            <div class="admin-compressor-row">
                                                <label>Ancho maximo</label>
                                                <select data-max-width>
                                                    <option value="1600">1600 px</option>
                                                    <option value="1920" selected>1920 px</option>
                                                    <option value="2560">2560 px</option>
                                                </select>
                                            </div>
                                            <div class="admin-compression-result" data-compression-result>Preparando imagen...</div>
                                            <button type="button" class="admin-media-upload" data-media-upload disabled>Comprimir y guardar</button>
                                        </div>
                                        <div class="admin-media-message" data-media-message></div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endforeach
                <div class="admin-empty-results" id="mediaEmptyState">Esta pagina todavia no tiene imagenes administrables.</div>
            </div>

            @php
                $initialPage = $translationPages[$translations->keys()->first()] ?? ['name' => 'Sitio INDI', 'path' => '/'];
            @endphp
            <section class="translation-preview" aria-label="Previsualizacion de la pagina real">
                <div class="translation-preview-toolbar">
                    <div class="translation-preview-title">
                        <strong id="previewPageName">{{ $initialPage['name'] }}</strong>
                        <span id="previewStatus">Vista real en espanol</span>
                    </div>
                    <div class="translation-preview-actions">
                        <button type="button" class="active" data-preview-device="desktop">Escritorio</button>
                        <button type="button" data-preview-device="mobile">Movil</button>
                        <button type="button" id="previewSpanish">ES</button>
                        <button type="button" id="previewEnglish">EN</button>
                        <button type="button" id="refreshPreview">Actualizar</button>
                        <a id="openPreview" href="{{ $initialPage['path'] }}" target="_blank" rel="noopener">Abrir &#8599;</a>
                    </div>
                </div>
                <div class="translation-preview-stage">
                    <div class="translation-preview-browser" id="previewBrowser"><iframe id="sitePreview" src="{{ $initialPage['path'] }}" title="Previsualizacion del sitio"></iframe></div>
                </div>
            </section>
        </form>
    </div>
</div>

<script>
    (() => {
        const form = document.getElementById('translationsForm');
        const search = document.getElementById('translationSearch');
        const clearSearch = document.getElementById('clearTranslationSearch');
        const missingOnly = document.getElementById('missingEnglishOnly');
        const visibleCount = document.getElementById('visibleTranslationsCount');
        const dirtyState = document.getElementById('dirtyStateLabel');
        const saveHint = document.getElementById('saveHint');
        const emptyState = document.getElementById('translationEmptyState');
        const mediaEmptyState = document.getElementById('mediaEmptyState');
        const textPanel = document.querySelector('[data-content-panel="texts"]');
        const mediaPanel = document.querySelector('[data-content-panel="media"]');
        const modeButtons = [...document.querySelectorAll('[data-content-mode]')];
        const mediaSections = [...document.querySelectorAll('[data-media-group-section]')];
        const csrfToken = form.querySelector('input[name="_token"]').value;
        const cards = [...document.querySelectorAll('[data-translation-card]')];
        const sections = [...document.querySelectorAll('[data-group-section]')];
        const groupLinks = [...document.querySelectorAll('[data-group-link]')];
        const preview = document.getElementById('sitePreview');
        const previewBrowser = document.getElementById('previewBrowser');
        const previewPageName = document.getElementById('previewPageName');
        const previewStatus = document.getElementById('previewStatus');
        const openPreview = document.getElementById('openPreview');
        const refreshPreview = document.getElementById('refreshPreview');
        const initialForm = new FormData(form);
        let isDirty = false;
        let activeGroup = sections[0]?.dataset.groupSection || '';
        let activeMode = 'texts';

        let currentPreviewPath = groupLinks[0]?.dataset.pagePath || '/';
        const normalize = (value) => value.toString().trim().toLowerCase();

        const updateDirtyState = () => {
            const currentForm = new FormData(form);
            isDirty = false;

            for (const [key, value] of currentForm.entries()) {
                if (initialForm.get(key) !== value) {
                    isDirty = true;
                    break;
                }
            }

            dirtyState.textContent = isDirty ? 'Cambios sin guardar' : 'Sin cambios pendientes';
            saveHint.textContent = isDirty ? 'Listo para guardar tus cambios.' : 'Los cambios se aplican al guardar.';
            form.classList.toggle('has-unsaved-changes', isDirty);
        };

        const applyFilters = () => {
            const isMediaMode = activeMode === 'media';
            textPanel.hidden = isMediaMode;
            mediaPanel.hidden = !isMediaMode;
            missingOnly.closest('.admin-toggle-row').hidden = isMediaMode;
            document.querySelectorAll('.admin-toolbar-save, .admin-save-bar').forEach((item) => item.hidden = isMediaMode);

            mediaSections.forEach((section) => {
                section.hidden = !isMediaMode || section.dataset.mediaGroupSection !== activeGroup;
            });

            if (isMediaMode) {
                const activeMediaSection = mediaSections.find((section) => section.dataset.mediaGroupSection === activeGroup);
                const count = activeMediaSection?.querySelectorAll('[data-media-card]').length || 0;
                mediaEmptyState.hidden = count > 0;
                visibleCount.textContent = `${count} ${count === 1 ? 'imagen' : 'imagenes'}`;
                search.closest('.admin-search-row').hidden = true;
                return;
            }

            search.closest('.admin-search-row').hidden = false;
            const query = normalize(search.value);
            let shown = 0;
            const activeSection = sections.find((section) => section.dataset.groupSection === activeGroup);
            cards.forEach((card) => {
                const matchesSearch = !query || card.dataset.search.includes(query);
                const matchesMissing = !missingOnly.checked || card.dataset.missingEn === '1';
                const isVisible = matchesSearch && matchesMissing;
                card.hidden = !isVisible;
                shown += isVisible && activeSection?.contains(card) ? 1 : 0;
            });
            sections.forEach((section) => {
                section.hidden = section.dataset.groupSection !== activeGroup;
            });
            visibleCount.textContent = `${shown} ${shown === 1 ? 'texto visible' : 'textos visibles'}`;
            emptyState.hidden = shown > 0;
        };

        const setActiveGroup = (group, updateHash = true) => {
            if (!group) {
                return;
            }

            activeGroup = group;
            groupLinks.forEach((link) => {
                link.classList.toggle('active', link.dataset.groupLink === activeGroup);
            });

            applyFilters();

            if (updateHash) {
                history.replaceState(null, '', `#group-${activeGroup}`);
            }

            const activeLink = groupLinks.find((link) => link.dataset.groupLink === activeGroup);
            if (activeLink) {
                currentPreviewPath = activeLink.dataset.pagePath || '/';
                previewPageName.textContent = activeLink.dataset.pageName;
                openPreview.href = currentPreviewPath;
                preview.src = `${currentPreviewPath}${currentPreviewPath.includes('?') ? '&' : '?'}translation_preview=${Date.now()}`;
            }

            window.scrollTo({ top: 0, behavior: 'smooth' });
        };

        document.querySelectorAll('[data-copy-es]').forEach((button) => {
            button.addEventListener('click', () => {
                const card = button.closest('[data-translation-card]');
                const fields = card.querySelectorAll('input, textarea');
                fields[1].value = fields[0].value;
                fields[1].dispatchEvent(new Event('input', { bubbles: true }));
            });
        });

        search.addEventListener('input', applyFilters);
        missingOnly.addEventListener('change', applyFilters);
        form.addEventListener('input', updateDirtyState);
        form.addEventListener('submit', () => {
            window.onbeforeunload = null;
        });
        clearSearch.addEventListener('click', () => {
            search.value = '';
            search.focus();
            applyFilters();
        });

        groupLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                setActiveGroup(link.dataset.groupLink);
            });
        });

        const changePreviewLanguage = async (locale) => {
            previewStatus.textContent = 'Cambiando idioma...';
            try {
                await fetch(`/idioma/${locale}`, { credentials: 'same-origin' });
                preview.src = `${currentPreviewPath}${currentPreviewPath.includes('?') ? '&' : '?'}translation_preview=${Date.now()}`;
                previewStatus.textContent = `Vista real en ${locale === 'es' ? 'espanol' : 'ingles'}`;
            } catch (error) {
                previewStatus.textContent = 'No se pudo cambiar el idioma';
            }
        };
        document.getElementById('previewSpanish').addEventListener('click', () => changePreviewLanguage('es'));
        document.getElementById('previewEnglish').addEventListener('click', () => changePreviewLanguage('en'));
        refreshPreview.addEventListener('click', () => {
            preview.src = `${currentPreviewPath}${currentPreviewPath.includes('?') ? '&' : '?'}translation_preview=${Date.now()}`;
        });
        document.querySelectorAll('[data-preview-device]').forEach((button) => {
            button.addEventListener('click', () => {
                document.querySelectorAll('[data-preview-device]').forEach((item) => item.classList.toggle('active', item === button));
                previewBrowser.classList.toggle('mobile', button.dataset.previewDevice === 'mobile');
            });
        });
        cards.forEach((card) => {
            card.addEventListener('focusin', () => {
                cards.forEach((item) => item.classList.toggle('is-previewed', item === card));
                const text = card.querySelector('input, textarea')?.value?.trim();
                if (!text) return;
                try {
                    const candidates = [...preview.contentDocument.body.querySelectorAll('h1,h2,h3,h4,p,span,a,button,label')];
                    const target = candidates.find((element) => element.textContent.trim().replace(/\s+/g, ' ') === text.replace(/\s+/g, ' '));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        target.style.outline = '4px solid #ffb000';
                        target.style.outlineOffset = '5px';
                    }
                } catch (error) {}
            });
        });

        modeButtons.forEach((button) => {
            button.addEventListener('click', () => {
                activeMode = button.dataset.contentMode;
                modeButtons.forEach((item) => item.classList.toggle('active', item === button));
                applyFilters();
            });
        });

        const formatBytes = (bytes) => {
            if (bytes < 1024) return `${bytes} B`;
            if (bytes < 1048576) return `${(bytes / 1024).toFixed(1)} KB`;
            return `${(bytes / 1048576).toFixed(2)} MB`;
        };

        const canvasBlob = (canvas, quality) => new Promise((resolve, reject) => {
            canvas.toBlob((blob) => blob ? resolve(blob) : reject(new Error('No se pudo comprimir la imagen.')), 'image/webp', quality);
        });

        const prepareMedia = async (card) => {
            const input = card.querySelector('[data-media-input]');
            const file = input.files?.[0];
            if (!file) return;

            const compressor = card.querySelector('[data-compressor]');
            const result = card.querySelector('[data-compression-result]');
            const upload = card.querySelector('[data-media-upload]');
            const quality = Number(card.querySelector('[data-quality]').value) / 100;
            const maxWidth = Number(card.querySelector('[data-max-width]').value);
            compressor.hidden = false;
            upload.disabled = true;
            result.textContent = 'Comprimiendo en tu navegador...';

            try {
                const bitmap = await createImageBitmap(file);
                const scale = Math.min(1, maxWidth / bitmap.width);
                const width = Math.max(1, Math.round(bitmap.width * scale));
                const height = Math.max(1, Math.round(bitmap.height * scale));
                const canvas = document.createElement('canvas');
                canvas.width = width;
                canvas.height = height;
                const context = canvas.getContext('2d');
                context.drawImage(bitmap, 0, 0, width, height);
                bitmap.close();

                const blob = await canvasBlob(canvas, quality);
                card.compressedBlob = blob;
                const saved = Math.round((1 - (blob.size / file.size)) * 100);
                result.textContent = `${formatBytes(file.size)} → ${formatBytes(blob.size)} · ${width} x ${height} px${saved > 0 ? ` · ${saved}% menos` : ''}`;
                const previousPreview = card.dataset.objectUrl;
                if (previousPreview) URL.revokeObjectURL(previousPreview);
                card.dataset.objectUrl = URL.createObjectURL(blob);
                card.querySelector('.admin-media-preview').src = card.dataset.objectUrl;
                upload.disabled = false;
            } catch (error) {
                result.textContent = error.message || 'No se pudo procesar esta imagen.';
                card.querySelector('[data-media-message]').textContent = 'Usa una imagen JPG, PNG o WebP valida.';
            }
        };

        document.querySelectorAll('[data-media-card]').forEach((card) => {
            const input = card.querySelector('[data-media-input]');
            const quality = card.querySelector('[data-quality]');
            const maxWidth = card.querySelector('[data-max-width]');
            const upload = card.querySelector('[data-media-upload]');
            let compressionTimer;

            input.addEventListener('change', () => prepareMedia(card));
            quality.addEventListener('input', () => {
                card.querySelector('[data-quality-value]').textContent = `${quality.value}%`;
                clearTimeout(compressionTimer);
                compressionTimer = setTimeout(() => prepareMedia(card), 180);
            });
            maxWidth.addEventListener('change', () => prepareMedia(card));

            upload.addEventListener('click', async () => {
                if (!card.compressedBlob) return;
                const message = card.querySelector('[data-media-message]');
                const data = new FormData();
                data.append('image', new File([card.compressedBlob], `imagen-${Date.now()}.webp`, { type: 'image/webp' }));
                upload.disabled = true;
                upload.textContent = 'Guardando...';
                message.textContent = '';

                try {
                    const response = await fetch(card.dataset.uploadUrl, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                        credentials: 'same-origin',
                        body: data,
                    });
                    const payload = await response.json();
                    if (!response.ok) throw new Error(payload.message || 'No se pudo guardar.');
                    card.querySelector('.admin-media-preview').src = `${payload.url}?v=${Date.now()}`;
                    message.textContent = payload.message;
                    input.value = '';
                    card.querySelector('[data-compressor]').hidden = true;
                    card.compressedBlob = null;
                    refreshPreview.click();
                } catch (error) {
                    message.textContent = error.message || 'No se pudo guardar la imagen.';
                } finally {
                    upload.textContent = 'Comprimir y guardar';
                    upload.disabled = !card.compressedBlob;
                }
            });
        });

        const requestedGroup = window.location.hash.replace('#group-', '');
        const requestedGroupExists = sections.some((section) => section.dataset.groupSection === requestedGroup);
        setActiveGroup(requestedGroupExists ? requestedGroup : activeGroup, false);

        window.onbeforeunload = (event) => {
            if (!isDirty) {
                return undefined;
            }

            event.preventDefault();
            event.returnValue = '';
            return '';
        };
    })();
</script>
@endsection
