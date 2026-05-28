@php
    $project = $project ?? null;
    $categories = [
        1 => ['label' => 'Infraestructura', 'color' => '#64b032'],
        2 => ['label' => 'Construcción', 'color' => '#ffa608'],
        3 => ['label' => 'Marítimo', 'color' => '#0066f9'],
        4 => ['label' => 'Ferroviaria', 'color' => '#ff3000'],
    ];
@endphp

<style>
    .project-form-grid {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 2rem;
        align-items: start;
    }

    .project-form-card {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 2rem;
        background: #fff;
    }

    .project-field {
        margin-bottom: 1.4rem;
    }

    .project-field label {
        display: block;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .project-field input,
    .project-field select,
    .project-field textarea {
        width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        padding: 0.9rem 1rem;
        font: inherit;
        color: #0f172a;
        box-sizing: border-box;
    }

    .project-field textarea {
        min-height: 180px;
        resize: vertical;
        line-height: 1.6;
    }

    .project-two-cols {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .project-help {
        color: #64748b;
        font-size: 0.82rem;
        margin-top: 0.4rem;
        line-height: 1.5;
    }

    .project-preview-img {
        width: 100%;
        aspect-ratio: 16 / 10;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        background: #f1f5f9;
        display: block;
    }

    .project-toggle {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        padding: 1rem;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        background: #f8fafc;
    }

    .project-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }

    @media (max-width: 900px) {
        .project-form-grid,
        .project-two-cols {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="project-form-grid">
    <div class="project-form-card">
        <div class="project-field">
            <label for="title">Título</label>
            <input id="title" name="title" type="text" value="{{ old('title', $project->title ?? '') }}" required placeholder="Cablebús Línea 1">
        </div>

        <div class="project-two-cols">
            <div class="project-field">
                <label for="address">Ubicación</label>
                <input id="address" name="address" type="text" value="{{ old('address', $project->address ?? '') }}" required placeholder="Ciudad de México">
            </div>

            <div class="project-field">
                <label for="category">Tipo</label>
                <select id="category" name="category" required>
                    @foreach($categories as $value => $category)
                        <option value="{{ $value }}" @selected((string) old('category', $project->category ?? 1) === (string) $value)>
                            {{ $category['label'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="project-field">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" placeholder="Describe el alcance, impacto o datos relevantes del proyecto.">{{ old('description', $project->description ?? '') }}</textarea>
        </div>

        <div class="project-two-cols">
            <div class="project-field">
                <label for="latitude">Latitud</label>
                <input id="latitude" name="latitude" type="number" step="0.0000001" value="{{ old('latitude', $project->latitude ?? '') }}" required placeholder="19.5577669">
            </div>

            <div class="project-field">
                <label for="longitude">Longitud</label>
                <input id="longitude" name="longitude" type="number" step="0.0000001" value="{{ old('longitude', $project->longitude ?? '') }}" required placeholder="-99.1344122">
            </div>
        </div>

        <label class="project-toggle">
            <input type="checkbox" name="status" value="1" @checked(old('status', $project->status ?? true))>
            <span>Mostrar como completado</span>
        </label>
    </div>

    <div class="project-form-card">
        <div class="project-field">
            <label for="marker_image">Imagen</label>
            <input id="marker_image" name="marker_image" type="file" accept="image/*" @if(empty($project)) required @endif>
            <div class="project-help">Formatos permitidos: JPG, PNG, GIF o WEBP. Tamaño máximo: 20 MB.</div>
        </div>

        @if(!empty($project?->marker_image))
            <img class="project-preview-img" src="{{ asset('storage/' . $project->marker_image) }}" alt="{{ $project->title }}">
        @else
            <div class="project-preview-img" style="display: flex; align-items: center; justify-content: center; color: #94a3b8; font-weight: 700;">
                Sin imagen cargada
            </div>
        @endif
    </div>
</div>

<div class="project-actions">
    <a href="{{ route('admin.proyectos.index') }}" style="background: #e2e8f0; color: #334155; padding: 0.9rem 1.6rem; text-decoration: none; border-radius: 4px; font-weight: 700;">Cancelar</a>
    <button type="submit" style="background: #0066f9; color: white; border: none; padding: 0.9rem 1.8rem; border-radius: 4px; font-weight: 700; cursor: pointer; font-family: 'usual', sans-serif;">Guardar Proyecto</button>
</div>
