@extends('layouts.app')

@section('title', 'CMS - Traducciones')

@php
    $totalTranslations = $translations->flatten(1)->count();
    $missingEnglish = $translations->flatten(1)->filter(fn ($item) => blank($item->text_en))->count();
    $multilineTranslations = $translations->flatten(1)->where('is_multiline', true)->count();
    $completeTranslations = $totalTranslations - $missingEnglish;
@endphp

@section('content')
<div class="admin-translations-page">
    <div class="admin-translations-shell">
        <header class="admin-translations-hero">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="admin-back-link">Panel principal</a>
                <h1>Traducciones</h1>
                <p>Actualiza los textos en espanol e ingles desde una sola vista.</p>
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
                        <a href="#group-{{ Str::slug($group) }}" class="admin-group-link {{ $loop->first ? 'active' : '' }}" data-group-link="{{ Str::slug($group) }}">
                            <span>{{ $group }}</span>
                            <strong>{{ $items->count() }}</strong>
                        </a>
                    @endforeach
                </nav>
            </aside>

            <div class="admin-translations-list">
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
        const cards = [...document.querySelectorAll('[data-translation-card]')];
        const sections = [...document.querySelectorAll('[data-group-section]')];
        const groupLinks = [...document.querySelectorAll('[data-group-link]')];
        const initialForm = new FormData(form);
        let isDirty = false;
        let activeGroup = sections[0]?.dataset.groupSection || '';

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
            if (emptyState) {
                emptyState.hidden = shown > 0;
            }
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
