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

    .project-image-status {
        margin-top: 0.8rem;
        padding: 0.8rem 1rem;
        border-radius: 6px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-size: 0.86rem;
        line-height: 1.5;
    }

    .project-image-status strong {
        color: #0f172a;
    }

    .project-location-map {
        width: 100%;
        height: 380px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        overflow: hidden;
        background: #e2e8f0;
        margin-top: 1rem;
    }

    .project-map-toolbar {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        align-items: center;
        margin-top: 0.8rem;
    }

    .project-map-btn {
        border: 1px solid #cbd5e1;
        background: #fff;
        color: #334155;
        border-radius: 4px;
        padding: 0.65rem 0.9rem;
        font: inherit;
        font-weight: 700;
        cursor: pointer;
    }

    .project-map-btn:hover {
        border-color: #0066f9;
        color: #0066f9;
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

        <div class="project-field">
            <label for="title_en">Título en inglés</label>
            <input id="title_en" name="title_en" type="text" value="{{ old('title_en', $project->title_en ?? '') }}" placeholder="Cablebus Line 1">
            <div class="project-help">Si se deja vacío, el sitio mostrará el título en español.</div>
        </div>

        <div class="project-two-cols">
            <div class="project-field">
                <label for="address">Ubicación</label>
                <input id="address" name="address" type="text" value="{{ old('address', $project->address ?? '') }}" required placeholder="Ciudad de México">
            </div>

            <div class="project-field">
                <label for="address_en">Ubicación en inglés</label>
                <input id="address_en" name="address_en" type="text" value="{{ old('address_en', $project->address_en ?? '') }}" placeholder="Mexico City">
            </div>
        </div>

        <div class="project-two-cols">
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

        <div class="project-two-cols">
            <div class="project-field">
                <label for="home_order">Posición en inicio</label>
                <select id="home_order" name="home_order">
                    <option value="">No mostrar en inicio</option>
                    @for($position = 1; $position <= 5; $position++)
                        <option value="{{ $position }}" @selected((string) old('home_order', $project->home_order ?? '') === (string) $position)>Posición {{ $position }}</option>
                    @endfor
                </select>
                <div class="project-help">La portada usa de 3 a 5 proyectos. Si asignas una posición ocupada, el proyecto anterior sale del carrusel de inicio.</div>
            </div>
        </div>

        <div class="project-field">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" placeholder="Describe el alcance, impacto o datos relevantes del proyecto.">{{ old('description', $project->description ?? '') }}</textarea>
        </div>

        <div class="project-field">
            <label for="description_en">Descripción en inglés</label>
            <textarea id="description_en" name="description_en" placeholder="Describe the scope, impact, or relevant project facts.">{{ old('description_en', $project->description_en ?? '') }}</textarea>
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

        <div class="project-field">
            <label>Elegir en mapa</label>
            <div id="projectLocationMap" class="project-location-map"></div>
            <div class="project-map-toolbar">
                <button type="button" class="project-map-btn" data-map-center="cdmx">Centrar CDMX</button>
                <button type="button" class="project-map-btn" data-map-center="mexico">Centrar México</button>
                <span class="project-help">Haz clic en el mapa o arrastra el pin para actualizar las coordenadas.</span>
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
            <div class="project-help">La imagen se comprimirá automáticamente antes de guardarse. Formatos permitidos: JPG, PNG, GIF o WEBP.</div>
            <div id="projectImageStatus" class="project-image-status" style="display: none;"></div>
        </div>

        @if(!empty($project?->marker_image))
            <img class="project-preview-img" id="projectImagePreview" src="{{ asset('storage/' . $project->marker_image) }}" alt="{{ $project->title }}">
        @else
            <div class="project-preview-img" id="projectImagePreviewEmpty" style="display: flex; align-items: center; justify-content: center; color: #94a3b8; font-weight: 700;">
                Sin imagen cargada
            </div>
            <img class="project-preview-img" id="projectImagePreview" src="" alt="Vista previa" style="display: none;">
        @endif
    </div>
</div>

<div class="project-actions">
    <a href="{{ route('admin.proyectos.index') }}" style="background: #e2e8f0; color: #334155; padding: 0.9rem 1.6rem; text-decoration: none; border-radius: 4px; font-weight: 700;">Cancelar</a>
    <button type="submit" style="background: #0066f9; color: white; border: none; padding: 0.9rem 1.8rem; border-radius: 4px; font-weight: 700; cursor: pointer; font-family: 'usual', sans-serif;">Guardar Proyecto</button>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mapEl = document.getElementById('projectLocationMap');
        const latInput = document.getElementById('latitude');
        const lngInput = document.getElementById('longitude');
        if (!mapEl || !latInput || !lngInput || typeof L === 'undefined') return;

        const centers = {
            cdmx: [19.4326077, -99.133208],
            mexico: [23.6345, -102.5528],
        };

        const getInputPosition = () => {
            const lat = parseFloat(latInput.value);
            const lng = parseFloat(lngInput.value);

            if (Number.isFinite(lat) && Number.isFinite(lng)) {
                return [lat, lng];
            }

            return centers.cdmx;
        };

        const setInputs = (latLng) => {
            latInput.value = Number(latLng.lat).toFixed(7);
            lngInput.value = Number(latLng.lng).toFixed(7);
            latInput.dispatchEvent(new Event('change', { bubbles: true }));
            lngInput.dispatchEvent(new Event('change', { bubbles: true }));
        };

        const map = L.map(mapEl, {
            center: getInputPosition(),
            zoom: latInput.value && lngInput.value ? 14 : 11,
            scrollWheelZoom: false,
        });

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; CartoDB',
            maxZoom: 19,
        }).addTo(map);

        const marker = L.marker(getInputPosition(), {
            draggable: true,
            autoPan: true,
        }).addTo(map);

        marker.on('dragend', () => setInputs(marker.getLatLng()));

        map.on('click', (event) => {
            marker.setLatLng(event.latlng);
            setInputs(event.latlng);
        });

        const syncMarkerFromInputs = () => {
            const position = getInputPosition();
            marker.setLatLng(position);
            map.panTo(position);
        };

        latInput.addEventListener('change', syncMarkerFromInputs);
        lngInput.addEventListener('change', syncMarkerFromInputs);

        document.querySelectorAll('[data-map-center]').forEach((button) => {
            button.addEventListener('click', () => {
                const center = centers[button.dataset.mapCenter] || centers.cdmx;
                map.setView(center, button.dataset.mapCenter === 'mexico' ? 5 : 11);
            });
        });

        setTimeout(() => map.invalidateSize(), 250);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('marker_image');
        const status = document.getElementById('projectImageStatus');
        const preview = document.getElementById('projectImagePreview');
        const emptyPreview = document.getElementById('projectImagePreviewEmpty');
        if (!input || !status || !preview) return;

        const maxWidth = 1800;
        const maxHeight = 1200;
        const quality = 0.82;

        const formatBytes = (bytes) => {
            if (!bytes) return '0 KB';
            const units = ['B', 'KB', 'MB'];
            const index = Math.min(Math.floor(Math.log(bytes) / Math.log(1024)), units.length - 1);
            return `${(bytes / Math.pow(1024, index)).toFixed(index === 0 ? 0 : 2)} ${units[index]}`;
        };

        const showStatus = (html) => {
            status.innerHTML = html;
            status.style.display = 'block';
        };

        const loadImage = (file) => new Promise((resolve, reject) => {
            const image = new Image();
            const url = URL.createObjectURL(file);

            image.onload = () => {
                URL.revokeObjectURL(url);
                resolve(image);
            };
            image.onerror = () => {
                URL.revokeObjectURL(url);
                reject(new Error('No se pudo leer la imagen.'));
            };
            image.src = url;
        });

        const canvasToBlob = (canvas) => new Promise((resolve) => {
            canvas.toBlob(resolve, 'image/jpeg', quality);
        });

        input.addEventListener('change', async () => {
            const file = input.files?.[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                showStatus('El archivo seleccionado no es una imagen valida.');
                return;
            }

            showStatus('Comprimiendo imagen...');

            try {
                const image = await loadImage(file);
                const scale = Math.min(maxWidth / image.width, maxHeight / image.height, 1);
                const width = Math.round(image.width * scale);
                const height = Math.round(image.height * scale);

                const canvas = document.createElement('canvas');
                canvas.width = width;
                canvas.height = height;

                const context = canvas.getContext('2d');
                context.drawImage(image, 0, 0, width, height);

                const blob = await canvasToBlob(canvas);
                if (!blob) {
                    showStatus('No se pudo comprimir la imagen. Se enviara el archivo original.');
                    return;
                }

                const compressedFile = new File(
                    [blob],
                    file.name.replace(/\.[^.]+$/, '') + '.jpg',
                    { type: 'image/jpeg', lastModified: Date.now() }
                );

                const transfer = new DataTransfer();
                transfer.items.add(compressedFile);
                input.files = transfer.files;

                const saved = Math.max(0, file.size - compressedFile.size);
                showStatus(
                    `<strong>Imagen comprimida.</strong><br>` +
                    `Original: ${formatBytes(file.size)} · Final: ${formatBytes(compressedFile.size)} · Ahorro: ${formatBytes(saved)}`
                );

                preview.src = URL.createObjectURL(compressedFile);
                preview.style.display = 'block';
                if (emptyPreview) emptyPreview.style.display = 'none';
            } catch (error) {
                showStatus('No se pudo comprimir la imagen. Se enviara el archivo original.');
            }
        });
    });
</script>
