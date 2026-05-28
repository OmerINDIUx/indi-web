@extends('layouts.app')

@section('title', 'CMS - Proyectos')

@section('content')
@php
    $categories = [
        1 => ['label' => 'Infraestructura', 'bg' => '#dcfce7', 'color' => '#15803d'],
        2 => ['label' => 'Construcción', 'bg' => '#fef3c7', 'color' => '#d97706'],
        3 => ['label' => 'Marítimo', 'bg' => '#e0f2fe', 'color' => '#0066f9'],
        4 => ['label' => 'Ferroviaria', 'bg' => '#fee2e2', 'color' => '#dc2626'],
    ];
@endphp

<style>
    .projects-admin-filter {
        display: grid;
        grid-template-columns: minmax(240px, 1fr) 210px 180px auto auto;
        gap: 0.8rem;
        align-items: end;
        margin-bottom: 2rem;
        padding: 1.2rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background: #f8fafc;
        font-family: 'usual', sans-serif;
    }

    .projects-admin-filter label {
        display: block;
        color: #334155;
        font-size: 0.78rem;
        font-weight: 700;
        margin-bottom: 0.4rem;
        text-transform: uppercase;
    }

    .projects-admin-filter input,
    .projects-admin-filter select {
        width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 4px;
        padding: 0.75rem 0.85rem;
        color: #0f172a;
        font: inherit;
        box-sizing: border-box;
        background: white;
    }

    .projects-admin-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 42px;
        padding: 0.75rem 1.2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 700;
        border: none;
        cursor: pointer;
        font-family: 'usual', sans-serif;
        white-space: nowrap;
    }

    .projects-admin-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
        font-family: 'usual', sans-serif;
    }

    .projects-admin-pages {
        display: flex;
        gap: 0.4rem;
        flex-wrap: wrap;
    }

    .projects-admin-page {
        min-width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        border: 1px solid #cbd5e1;
        color: #334155;
        text-decoration: none;
        font-weight: 700;
        background: white;
    }

    .projects-admin-page.active {
        background: #0066f9;
        border-color: #0066f9;
        color: white;
    }

    .projects-admin-page.disabled {
        opacity: 0.4;
        pointer-events: none;
    }

    @media (max-width: 980px) {
        .projects-admin-filter {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 640px) {
        .projects-admin-filter {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 1200px; margin: 0 auto;">
        @if(session('success'))
            <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 1rem; border-radius: 4px; margin-bottom: 2rem; font-family: 'usual', sans-serif; font-weight: 500;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background: white; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 8px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; gap: 1rem; flex-wrap: wrap;">
                <h1 class="indi-heading" style="font-size: 2rem; margin: 0; color: var(--indi-dark);">CMS <span style="color: #64b032;">PROYECTOS</span></h1>
                <div style="display: flex; gap: 1rem;">
                    <a href="{{ route('admin.dashboard') }}" style="background: #eee; color: #333; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; font-family: 'usual', sans-serif; font-size: 0.9rem;">&larr; Panel</a>
                    <a href="{{ route('admin.proyectos.create') }}" style="background: #64b032; color: white; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; font-family: 'usual', sans-serif; font-size: 0.9rem;">+ Nuevo Proyecto</a>
                </div>
            </div>

            <form method="GET" action="{{ route('admin.proyectos.index') }}" class="projects-admin-filter">
                <div>
                    <label for="search">Buscar</label>
                    <input id="search" type="search" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Título, ubicación o descripción">
                </div>

                <div>
                    <label for="category">Tipo</label>
                    <select id="category" name="category">
                        <option value="">Todos</option>
                        @foreach($categories as $value => $category)
                            <option value="{{ $value }}" @selected((string) ($filters['category'] ?? '') === (string) $value)>{{ $category['label'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status">Estado</label>
                    <select id="status" name="status">
                        <option value="">Todos</option>
                        <option value="completed" @selected(($filters['status'] ?? '') === 'completed')>Completado</option>
                        <option value="process" @selected(($filters['status'] ?? '') === 'process')>En proceso</option>
                    </select>
                </div>

                <button type="submit" class="projects-admin-btn" style="background: #0066f9; color: white;">Filtrar</button>
                <a href="{{ route('admin.proyectos.index') }}" class="projects-admin-btn" style="background: #e2e8f0; color: #334155;">Limpiar</a>
            </form>

            <div style="overflow-x: auto; font-family: 'usual', sans-serif;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: #f1f5f9; color: #334155; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 1.2rem; font-weight: 600; width: 90px;">Imagen</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Título</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 170px;">Ubicación</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 150px;">Tipo</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 170px;">Coordenadas</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 160px; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="color: #475569;">
                        @forelse($projects as $project)
                            <tr style="border-bottom: 1px solid #e2e8f0; vertical-align: middle;">
                                <td style="padding: 1.2rem;">
                                    @if($project->marker_image)
                                        <img src="{{ asset('storage/' . $project->marker_image) }}" alt="{{ $project->title }}" style="width: 68px; height: 50px; object-fit: cover; border-radius: 4px; border: 1px solid #e2e8f0;">
                                    @else
                                        <div style="width: 68px; height: 50px; background: #eaeaea; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; color: #888; border: 1px solid #e2e8f0;">N/A</div>
                                    @endif
                                </td>
                                <td style="padding: 1.2rem; font-weight: 700; color: #0f172a;">{{ $project->title }}</td>
                                <td style="padding: 1.2rem;">{{ $project->address }}</td>
                                <td style="padding: 1.2rem;">
                                    @php($category = $categories[$project->category] ?? $categories[1])
                                    <span style="background: {{ $category['bg'] }}; color: {{ $category['color'] }}; padding: 0.3rem 0.8rem; border-radius: 12px; font-size: 0.8em; font-weight: 700; text-transform: uppercase;">{{ $category['label'] }}</span>
                                </td>
                                <td style="padding: 1.2rem; font-size: 0.86rem;">{{ $project->latitude }}, {{ $project->longitude }}</td>
                                <td style="padding: 1.2rem; text-align: center;">
                                    <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                        <a href="{{ route('admin.proyectos.edit', $project) }}" style="background: #fef3c7; color: #d97706; padding: 0.4rem 0.8rem; border-radius: 4px; text-decoration: none; font-size: 0.8em; font-weight: 600; border: 1px solid #fde68a;">Editar</a>
                                        <form method="POST" action="{{ route('admin.proyectos.destroy', $project) }}" onsubmit="return confirm('¿Eliminar este proyecto? Esta acción no se puede deshacer.');" style="margin: 0; display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; padding: 0.4rem 0.8rem; border-radius: 4px; font-size: 0.8em; font-weight: 600; cursor: pointer;">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="padding: 3rem; text-align: center; color: #64748b;">No hay proyectos que coincidan con la búsqueda o filtros actuales.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($projects->hasPages())
                <div class="projects-admin-pagination">
                    <div style="color: #64748b; font-size: 0.9rem;">
                        Mostrando {{ $projects->firstItem() }}-{{ $projects->lastItem() }} de {{ $projects->total() }} proyectos
                    </div>

                    <div class="projects-admin-pages">
                        <a class="projects-admin-page {{ $projects->onFirstPage() ? 'disabled' : '' }}" href="{{ $projects->previousPageUrl() ?? '#' }}">&lt;</a>

                        @foreach($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                            <a class="projects-admin-page {{ $projects->currentPage() === $page ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a>
                        @endforeach

                        <a class="projects-admin-page {{ $projects->hasMorePages() ? '' : 'disabled' }}" href="{{ $projects->nextPageUrl() ?? '#' }}">&gt;</a>
                    </div>
                </div>
            @else
                <div style="margin-top: 2rem; color: #64748b; font-size: 0.9rem; font-family: 'usual', sans-serif;">
                    Mostrando {{ $projects->total() }} proyectos
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
