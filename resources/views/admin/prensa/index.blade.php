@extends('layouts.app')

@section('title', 'CMS - Bandeja de Prensa')

@section('content')
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 1200px; margin: 0 auto;">
        
        @if(session('success'))
            <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 1rem; border-radius: 4px; margin-bottom: 2rem; font-family: 'usual', sans-serif; font-weight: 500;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background: white; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 8px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <h1 class="indi-heading" style="font-size: 2rem; margin: 0; color: var(--indi-dark);">
                    BΛNDEJΛ DE <span style="color: #ffa608;">PRENSΛ</span>
                </h1>
                <div style="display: flex; gap: 1rem;">
                    <a href="{{ route('admin.dashboard') }}" style="background: #eee; color: #333; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; font-family: 'usual', sans-serif; font-size: 0.9rem;">&larr; Panel</a>
                    <a href="{{ route('admin.prensa.create') }}" style="background: #ffa608; color: white; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; font-family: 'usual', sans-serif; font-size: 0.9rem;">+ Nuevo Artículo</a>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-bottom: 1.5rem; padding: 1rem 1.2rem; background: #fff7ed; border: 1px solid #fed7aa; border-radius: 8px; font-family: 'usual', sans-serif; color: #9a3412; flex-wrap: wrap;">
                <div style="font-weight: 700;">Destacados activos: {{ $featuredCount ?? 0 }} / 3</div>
                <div style="font-size: 0.95rem;">La portada de Pensamiento Estratégico solo muestra hasta 3 artículos destacados y publicados.</div>
            </div>

            <form method="GET" action="{{ route('admin.prensa.index') }}" style="display: grid; grid-template-columns: minmax(260px, 2fr) repeat(3, minmax(180px, 1fr)) auto; gap: 1rem; margin-bottom: 2rem; font-family: 'usual', sans-serif; align-items: end;">
                <div>
                    <label for="search" style="display: block; margin-bottom: 0.45rem; font-size: 0.85rem; font-weight: 700; color: #475569;">Buscar</label>
                    <input id="search" name="search" type="text" value="{{ $filters['search'] ?? '' }}" placeholder="Título o slug" style="width: 100%; padding: 0.85rem 1rem; border: 1px solid #cbd5e1; border-radius: 6px; color: #0f172a;">
                </div>
                <div>
                    <label for="category" style="display: block; margin-bottom: 0.45rem; font-size: 0.85rem; font-weight: 700; color: #475569;">Categoría</label>
                    <select id="category" name="category" style="width: 100%; padding: 0.85rem 1rem; border: 1px solid #cbd5e1; border-radius: 6px; color: #0f172a; background: white;">
                        <option value="">Todas</option>
                        <option value="maritimo" @selected(($filters['category'] ?? '') === 'maritimo')>Marítimo</option>
                        <option value="construccion" @selected(($filters['category'] ?? '') === 'construccion')>Construcción</option>
                        <option value="infraestructura" @selected(($filters['category'] ?? '') === 'infraestructura')>Infraestructura</option>
                        <option value="ferroviario" @selected(($filters['category'] ?? '') === 'ferroviario')>Ferroviario</option>
                    </select>
                </div>
                <div>
                    <label for="status" style="display: block; margin-bottom: 0.45rem; font-size: 0.85rem; font-weight: 700; color: #475569;">Estado</label>
                    <select id="status" name="status" style="width: 100%; padding: 0.85rem 1rem; border: 1px solid #cbd5e1; border-radius: 6px; color: #0f172a; background: white;">
                        <option value="">Todos</option>
                        <option value="published" @selected(($filters['status'] ?? '') === 'published')>Publicados</option>
                        <option value="draft" @selected(($filters['status'] ?? '') === 'draft')>Borradores</option>
                    </select>
                </div>
                <div>
                    <label for="featured" style="display: block; margin-bottom: 0.45rem; font-size: 0.85rem; font-weight: 700; color: #475569;">Destacado</label>
                    <select id="featured" name="featured" style="width: 100%; padding: 0.85rem 1rem; border: 1px solid #cbd5e1; border-radius: 6px; color: #0f172a; background: white;">
                        <option value="">Todos</option>
                        <option value="featured" @selected(($filters['featured'] ?? '') === 'featured')>Destacados</option>
                        <option value="not_featured" @selected(($filters['featured'] ?? '') === 'not_featured')>No destacados</option>
                    </select>
                </div>
                <div style="display: flex; gap: 0.75rem;">
                    <button type="submit" style="background: #0f172a; color: white; padding: 0.85rem 1.2rem; border: none; border-radius: 6px; font-weight: 700; cursor: pointer;">Filtrar</button>
                    <a href="{{ route('admin.prensa.index') }}" style="display: inline-flex; align-items: center; justify-content: center; padding: 0.85rem 1.2rem; border-radius: 6px; border: 1px solid #cbd5e1; text-decoration: none; color: #475569; font-weight: 700;">Limpiar</a>
                </div>
            </form>

            <div style="overflow-x: auto; font-family: 'usual', sans-serif;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: #f1f5f9; color: #334155; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 1.2rem; font-weight: 600; width: 80px;">Portada</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Título</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 150px;">Categoría</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 120px;">Estado</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 130px;">Destacado</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 120px;">Fecha</th>
                            <th style="padding: 1.2rem; font-weight: 600; width: 250px; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="color: #475569;">
                        @forelse($posts ?? [] as $post)
                            <tr style="border-bottom: 1px solid #e2e8f0; vertical-align: middle;">
                                <td style="padding: 1.2rem;">
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Preview" style="width: 60px; height: 45px; object-fit: cover; border-radius: 4px; border: 1px solid #e2e8f0;">
                                    @else
                                        <div style="width: 60px; height: 45px; background: #eaeaea; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; color: #888; border: 1px solid #e2e8f0;">N/A</div>
                                    @endif
                                </td>
                                <td style="padding: 1.2rem; font-weight: 600; color: #0f172a;">
                                    {{ $post->title }}
                                </td>
                                <td style="padding: 1.2rem;">
                                    @if($post->category === 'maritimo')
                                        <span style="background: #e0f2fe; color: #0066f9; padding: 0.3rem 0.8rem; border-radius: 12px; font-size: 0.8em; font-weight: 700; text-transform: uppercase;">MΛRÍTIMO</span>
                                    @elseif($post->category === 'construccion')
                                        <span style="background: #fef3c7; color: #ffa608; padding: 0.3rem 0.8rem; border-radius: 12px; font-size: 0.8em; font-weight: 700; text-transform: uppercase;">CONSTRUCCIÓN</span>
                                    @elseif($post->category === 'infraestructura')
                                        <span style="background: #dcfce7; color: #64b032; padding: 0.3rem 0.8rem; border-radius: 12px; font-size: 0.8em; font-weight: 700; text-transform: uppercase;">INFRΛΞSTRUCTURΛ</span>
                                    @elseif($post->category === 'ferroviario')
                                        <span style="background: #fee2e2; color: #ff3000; padding: 0.3rem 0.8rem; border-radius: 12px; font-size: 0.8em; font-weight: 700; text-transform: uppercase;">FΞRROVIΛRIO</span>
                                    @endif
                                </td>
                                <td style="padding: 1.2rem;">
                                    <form method="POST" action="{{ route('admin.prensa.toggle-publish', $post->id) }}" style="margin:0;">
                                        @csrf
                                        <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; text-align: left;">
                                            @if($post->is_published)
                                                <span style="background: #dcfce7; color: #15803d; padding: 0.25rem 0.6rem; border-radius: 4px; font-size: 0.8em; font-weight: 600; border: 1px solid #bbf7d0; display: inline-block;">Publicado</span>
                                            @else
                                                <span style="background: #f1f5f9; color: #475569; padding: 0.25rem 0.6rem; border-radius: 4px; font-size: 0.8em; font-weight: 600; border: 1px solid #cbd5e1; display: inline-block;">Borrador</span>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td style="padding: 1.2rem;">
                                    <form method="POST" action="{{ route('admin.prensa.toggle-featured', $post->id) }}" style="margin:0;">
                                        @csrf
                                        <button
                                            type="submit"
                                            @disabled(! $post->is_published || (($featuredCount ?? 0) >= 3 && ! $post->is_featured))
                                            title="{{ ! $post->is_published ? 'Publica el artículo para destacarlo.' : ((($featuredCount ?? 0) >= 3 && ! $post->is_featured) ? 'Ya tienes 3 destacados activos.' : 'Mostrar en Pensamiento Estratégico') }}"
                                            style="background: none; border: none; padding: 0; cursor: {{ (! $post->is_published || (($featuredCount ?? 0) >= 3 && ! $post->is_featured)) ? 'not-allowed' : 'pointer' }}; text-align: left; opacity: {{ (! $post->is_published || (($featuredCount ?? 0) >= 3 && ! $post->is_featured)) ? '0.55' : '1' }};"
                                        >
                                            @if($post->is_featured)
                                                <span style="background: #fef3c7; color: #b45309; padding: 0.25rem 0.6rem; border-radius: 4px; font-size: 0.8em; font-weight: 700; border: 1px solid #fde68a; display: inline-block;">Destacado</span>
                                            @else
                                                <span style="background: #f8fafc; color: #64748b; padding: 0.25rem 0.6rem; border-radius: 4px; font-size: 0.8em; font-weight: 600; border: 1px solid #cbd5e1; display: inline-block;">Destacar</span>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td style="padding: 1.2rem; font-size: 0.9em;">
                                    {{ $post->created_at->format('d/m/Y') }}
                                </td>
                                <td style="padding: 1.2rem; text-align: center;">
                                    <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                        @if($post->is_published)
                                            <a href="{{ route('prensa.show', $post->slug) }}" target="_blank" style="background: #e0f2fe; color: #0066f9; padding: 0.4rem 0.8rem; border-radius: 4px; text-decoration: none; font-size: 0.8em; font-weight: 600; border: 1px solid #bae6fd;">Ver</a>
                                        @endif
                                        <a href="{{ route('admin.prensa.edit', $post->id) }}" style="background: #fef3c7; color: #d97706; padding: 0.4rem 0.8rem; border-radius: 4px; text-decoration: none; font-size: 0.8em; font-weight: 600; border: 1px solid #fde68a;">Editar</a>
                                        <form method="POST" action="{{ route('admin.prensa.destroy', $post->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar permanentemente este artículo de prensa? Esta acción no se puede deshacer.');" style="margin: 0; display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; padding: 0.4rem 0.8rem; border-radius: 4px; font-size: 0.8em; font-weight: 600; cursor: pointer;">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="padding: 3rem; text-align: center; color: #64748b;">No hay artículos registrados aún en el módulo de prensa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
