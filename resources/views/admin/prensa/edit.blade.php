@extends('layouts.app')

@section('title', 'CMS - Editar Artículo de Prensa')

@section('content')
<!-- Overlays de Bloqueo de Dispositivo / Orientación -->
<div class="device-overlay phone-only">
    <div class="overlay-card">
        <div class="overlay-icon">💻</div>
        <h2>PΛNΞL DΞ ΞDICIÓN NO DISPONIBLΞ ΞN CELULΛRES</h2>
        <p>Para garantizar una experiencia de diseño óptima y una previsualización de alta fidelidad, por favor ingresa desde una tableta o computadora.</p>
    </div>
</div>

<div class="device-overlay tablet-portrait-only">
    <div class="overlay-card">
        <div class="overlay-icon">🔄</div>
        <h2>GIRΛ TU DISPOSITIVO</h2>
        <p>Por favor, gira tu tableta a posición horizontal (modo landscape) para poder trabajar en el editor dinámico.</p>
    </div>
</div>
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 1400px; margin: 0 auto; padding: 0 2rem; box-sizing: border-box;">
        
        <div style="background: white; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 8px; font-family: 'usual', sans-serif;">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem; border-bottom: 1px solid #eee; padding-bottom: 2rem;">
                <h1 class="indi-heading" style="font-size: 2rem; margin: 0; color: var(--indi-dark);">
                    EDITΛR <span style="color: #ffa608;">ΛRTÍCULO</span> DΞ PRENSΛ
                </h1>
                <a href="{{ route('admin.prensa.index') }}" style="background: #eee; color: #333; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600;">&larr; Volver</a>
            </div>

            @if($errors->any())
                <div style="background: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b; padding: 1.5rem; border-radius: 4px; margin-bottom: 2rem;">
                    <ul style="margin: 0; padding-left: 1.5rem; font-weight: 500;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.prensa.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="editor-layout-wrapper">
                    <div class="editor-left-panel">
                        <!-- Título -->
                <div style="margin-bottom: 2rem;">
                    <label for="title" style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.5rem; font-size: 0.95rem;">Título del Artículo</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="Ej: Avances Tecnológicos en el Tramo 5" style="width: 100%; padding: 1rem; border: 1px solid #cbd5e1; border-radius: 4px; font-size: 1rem; font-family: 'usual', sans-serif; box-sizing: border-box;" required>
                    <small style="color: #64748b; margin-top: 0.3rem; display: block;">Slug actual: <code>{{ $post->slug }}</code> (Se actualizará automáticamente si editas el título).</small>
                </div>

                <!-- Categoría / Unidad de Negocio -->
                <div style="margin-bottom: 2rem;">
                    <label for="category" style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.5rem; font-size: 0.95rem;">Unidad de Negocio (Categoría)</label>
                    <select name="category" id="category" style="width: 100%; padding: 1rem; border: 1px solid #cbd5e1; border-radius: 4px; font-size: 1rem; font-family: 'usual', sans-serif; background: white; box-sizing: border-box;" required>
                        <option value="construccion" {{ old('category', $post->category) == 'construccion' ? 'selected' : '' }}>CONSTRUCCIÓN</option>
                        <option value="maritimo" {{ old('category', $post->category) == 'maritimo' ? 'selected' : '' }}>MΛRÍTIMO</option>
                        <option value="infraestructura" {{ old('category', $post->category) == 'infraestructura' ? 'selected' : '' }}>INFRΛΞSTRUCTURΛ</option>
                        <option value="ferroviario" {{ old('category', $post->category) == 'ferroviario' ? 'selected' : '' }}>FΞRROVIΛRIO</option>
                    </select>
                </div>

                <!-- Imagen Portada Actual e Upload -->
                <div style="margin-bottom: 2rem;">
                    <label for="thumbnail" style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.5rem; font-size: 0.95rem;">Imagen de Portada (Thumbnail)</label>
                    
                    @if($post->thumbnail)
                        <div style="margin-bottom: 1rem; border: 1px solid #e2e8f0; padding: 1rem; border-radius: 4px; background: #f8fafc; display: flex; align-items: center; gap: 1.5rem; max-width: 400px;">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Preview" style="width: 100px; height: 75px; object-fit: cover; border-radius: 4px; border: 1px solid #cbd5e1;">
                            <div>
                                <span style="font-size: 0.85em; font-weight: 600; color: #334155; display: block; margin-bottom: 0.3rem;">Imagen actual cargada</span>
                                <span style="font-size: 0.8em; color: #64748b;">Si subes una nueva imagen, se reemplazará la anterior permanentemente.</span>
                            </div>
                        </div>
                    @endif

                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*" style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 4px; font-size: 0.95rem; font-family: 'usual', sans-serif; background: #f8fafc; box-sizing: border-box;">
                    <div id="thumbnail-stats" style="margin-top: 0.5rem; font-size: 0.85rem; font-weight: 600; display: none;"></div>
                    <small style="color: #64748b; margin-top: 0.3rem; display: block;">Formato sugerido: Relación 4:3 (Ej: 800x600px). Formatos admitidos: JPG, PNG, WEBP. Máx: 3MB.</small>
                </div>

                <!-- ESTILOS Y CÓDIGO DEL EDITOR DE BLOQUES PREMIUM -->
                <style>
                    .editor-layout-wrapper {
                        display: grid;
                        grid-template-columns: 56% 44%;
                        gap: 2.5rem;
                        align-items: start;
                        margin-top: 1.5rem;
                    }
                    .editor-left-panel {
                        width: 100%;
                    }
                    .editor-right-panel {
                        position: sticky;
                        top: 150px;
                        height: calc(100vh - 200px);
                        overflow-y: auto;
                        border: 1px solid #cbd5e1;
                        border-radius: 8px;
                        background: white;
                        box-shadow: 0 4px 25px rgba(0,0,0,0.05);
                    }
                    .editor-right-panel::-webkit-scrollbar {
                        width: 6px;
                    }
                    .editor-right-panel::-webkit-scrollbar-track {
                        background: #f1f5f9;
                    }
                    .editor-right-panel::-webkit-scrollbar-thumb {
                        background: #cbd5e1;
                        border-radius: 3px;
                    }
                    .editor-right-panel::-webkit-scrollbar-thumb:hover {
                        background: #94a3b8;
                    }

                    /* Device overlays for phone and tablet orientation lockout */
                    .device-overlay {
                        display: none;
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100vw;
                        height: 100vh;
                        background: rgba(15, 23, 42, 0.97);
                        z-index: 999999;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-family: 'usual', sans-serif;
                        text-align: center;
                        padding: 2rem;
                        box-sizing: border-box;
                    }
                    .overlay-card {
                        max-width: 480px;
                        background: rgba(30, 41, 59, 0.75);
                        border: 1px solid rgba(255, 255, 255, 0.15);
                        backdrop-filter: blur(12px);
                        border-radius: 12px;
                        padding: 3rem 2rem;
                        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
                    }
                    .overlay-icon {
                        font-size: 3.5rem;
                        margin-bottom: 1.5rem;
                        animation: pulseRotate 2.5s infinite ease-in-out;
                        display: inline-block;
                    }
                    @keyframes pulseRotate {
                        0% { transform: scale(1) rotate(0deg); }
                        50% { transform: scale(1.15) rotate(8deg); }
                        100% { transform: scale(1) rotate(0deg); }
                    }
                    .overlay-card h2 {
                        font-weight: 700;
                        font-size: 1.5rem;
                        letter-spacing: 0.1em;
                        color: #ffa608;
                        margin-top: 0;
                        margin-bottom: 1.2rem;
                        line-height: 1.4;
                    }
                    .overlay-card p {
                        font-size: 0.95rem;
                        color: #94a3b8;
                        line-height: 1.7;
                        margin: 0;
                    }

                    @media (max-width: 767px) {
                        .device-overlay.phone-only {
                            display: flex !important;
                        }
                        body {
                            overflow: hidden !important;
                        }
                    }
                    @media (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {
                        .device-overlay.tablet-portrait-only {
                            display: flex !important;
                        }
                        body {
                            overflow: hidden !important;
                        }
                    }

                    .block-editor-container {
                        font-family: 'usual', sans-serif;
                    }
                    .block-item {
                        background: white;
                        border: 1px solid #cbd5e1;
                        border-radius: 6px;
                        padding: 1.2rem;
                        position: relative;
                        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
                        display: flex;
                        gap: 1.2rem;
                        align-items: flex-start;
                        transition: all 0.2s ease;
                    }
                    .block-item:hover {
                        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
                        border-color: #94a3b8;
                    }
                    .block-handle-p { border-left: 5px solid #2563eb; }
                    .block-handle-h2 { border-left: 5px solid #ffa608; }
                    .block-handle-blockquote { border-left: 5px solid #1e293b; }
                    .block-handle-image { border-left: 5px solid #10b981; }

                    .block-controls {
                        display: flex;
                        flex-direction: column;
                        gap: 5px;
                        opacity: 0.6;
                        transition: opacity 0.2s;
                    }
                    .block-item:hover .block-controls {
                        opacity: 1;
                    }
                    .block-btn {
                        background: #f1f5f9;
                        border: 1px solid #e2e8f0;
                        cursor: pointer;
                        border-radius: 4px;
                        width: 30px;
                        height: 30px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 0.8rem;
                        transition: all 0.2s;
                        color: #475569;
                    }
                    .block-btn:hover {
                        background: #e2e8f0;
                        color: #0f172a;
                    }
                    .block-btn-delete:hover {
                        background: #fee2e2;
                        color: #ef4444;
                        border-color: #fca5a5;
                    }
                    
                    .contenteditable-editor {
                        outline: none;
                        transition: border-color 0.2s;
                    }
                    .contenteditable-editor:focus {
                        border-color: #94a3b8;
                    }
                    .contenteditable-editor:empty::before {
                        content: attr(placeholder);
                        color: #94a3b8;
                        pointer-events: none;
                        display: block;
                    }

                    /* Live Preview Styles - Exact replica of frontend */
                    #live-preview {
                        font-size: 1.1rem;
                        line-height: 1.8;
                        color: #333;
                    }
                    #live-preview h2 {
                        font-family: 'usual', sans-serif;
                        font-weight: 700;
                        font-size: 1.8rem;
                        margin: 2.5rem 0 1.2rem;
                        color: #000;
                    }
                    #live-preview p {
                        margin-bottom: 1.5rem;
                    }
                    #live-preview b, #live-preview strong {
                        color: #000;
                        font-weight: 600;
                    }
                    #live-preview .article-inline-image {
                        width: 100%;
                        margin: 3rem 0;
                        border-radius: 4px;
                        overflow: hidden;
                    }
                    #live-preview .article-inline-image img {
                        width: 100%;
                        height: auto;
                        display: block;
                    }
                    #live-preview blockquote {
                        border-left: 4px solid #ffa608;
                        padding-left: 1.5rem;
                        margin: 3rem 0;
                        font-style: italic;
                        font-size: 1.3rem;
                        color: #555;
                        line-height: 1.5;
                        transition: border-color 0.3s;
                    }
                </style>

                <div class="block-editor-container" style="margin-bottom: 2.5rem;">
                    <label style="display: block; font-weight: 700; color: #334155; margin-bottom: 0.5rem; font-size: 0.95rem;">Contenido del Artículo (Cuerpo)</label>
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 4px; padding: 1rem; margin-bottom: 1.5rem; font-size: 0.85em; color: #475569;">
                        <strong>💡 Modo de Uso:</strong> Agrega bloques de texto, subtítulos, citas o imágenes en cualquier orden usando los botones. Puedes reordenar los bloques con las flechas (▲/▼) o eliminarlos (🗑️). Selecciona el texto y usa <code>Ctrl + B</code> para <b>negrita</b> o <code>Ctrl + I</code> para <i>itálica</i>.
                    </div>

                    <!-- Buttons to add blocks -->
                    <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 1.5rem;">
                        <button type="button" onclick="addBlock('p')" style="background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; border: none; padding: 0.8rem 1.2rem; border-radius: 6px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px; font-size: 0.9rem; transition: transform 0.1s; box-shadow: 0 2px 4px rgba(37,99,235,0.2);" onmousedown="this.style.transform='scale(0.97)'" onmouseup="this.style.transform='scale(1)'">
                            <span>📝</span> + Párrafo
                        </button>
                        <button type="button" onclick="addBlock('h2')" style="background: linear-gradient(135deg, #ffa608, #d97706); color: white; border: none; padding: 0.8rem 1.2rem; border-radius: 6px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px; font-size: 0.9rem; transition: transform 0.1s; box-shadow: 0 2px 4px rgba(245,158,11,0.2);" onmousedown="this.style.transform='scale(0.97)'" onmouseup="this.style.transform='scale(1)'">
                            <span>🏷️</span> + Subtítulo (H2)
                        </button>
                        <button type="button" onclick="addBlock('blockquote')" style="background: linear-gradient(135deg, #475569, #1e293b); color: white; border: none; padding: 0.8rem 1.2rem; border-radius: 6px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px; font-size: 0.9rem; transition: transform 0.1s; box-shadow: 0 2px 4px rgba(30,41,59,0.2);" onmousedown="this.style.transform='scale(0.97)'" onmouseup="this.style.transform='scale(1)'">
                            <span>💬</span> + Cita Destacada
                        </button>
                        <button type="button" onclick="addBlock('image')" style="background: linear-gradient(135deg, #10b981, #059669); color: white; border: none; padding: 0.8rem 1.2rem; border-radius: 6px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px; font-size: 0.9rem; transition: transform 0.1s; box-shadow: 0 2px 4px rgba(16,185,129,0.2);" onmousedown="this.style.transform='scale(0.97)'" onmouseup="this.style.transform='scale(1)'">
                            <span>📷</span> + Imagen
                        </button>
                    </div>

                    <!-- Container for blocks -->
                    <div id="blocks-container" style="display: flex; flex-direction: column; gap: 1.5rem; background: #f8fafc; border: 2px dashed #cbd5e1; border-radius: 8px; padding: 1.5rem; min-height: 120px; box-sizing: border-box;">
                        <!-- Dynamic blocks go here -->
                    </div>

                    <!-- Original textarea hidden from sight but updated dynamically for Laravel form submission -->
                    <textarea name="content" id="content" style="display: none;">{{ old('content', $post->content) }}</textarea>
                </div>

                <!-- Checkbox Publicar -->
                <div style="margin-bottom: 3rem; display: flex; align-items: center; gap: 0.5rem; margin-top: 2.5rem;">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }} style="width: 1.2rem; height: 1.2rem; cursor: pointer;">
                    <label for="is_published" style="font-weight: 600; color: #334155; cursor: pointer; user-select: none;">Artículo Publicado (Desmarcar para guardar como borrador privado)</label>
                </div>

                <!-- Botones Guardar/Cancelar -->
                <div style="display: flex; gap: 1rem; border-top: 1px solid #eee; padding-top: 2rem; margin-bottom: 2rem;">
                    <button type="submit" style="background: #ffa608; color: white; padding: 1rem 2.5rem; border: none; border-radius: 4px; font-weight: 700; font-size: 1rem; cursor: pointer; font-family: 'usual', sans-serif;">Actualizar Artículo</button>
                    <a href="{{ route('admin.prensa.index') }}" style="background: #f1f5f9; color: #475569; padding: 1rem 2.5rem; text-decoration: none; border-radius: 4px; font-weight: 700; font-size: 1rem; text-align: center; border: 1px solid #cbd5e1;">Cancelar</a>
                </div>
            </div>

            <!-- Real-time Live Preview Panel -->
            <div class="editor-right-panel">
                <div style="background: #f1f5f9; padding: 1rem 1.5rem; font-weight: 700; color: #1e293b; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e2e8f0; font-size: 0.9rem; position: sticky; top: 0; z-index: 10;">
                    <span style="display: flex; align-items: center; gap: 8px;">✨ VISTΛ PREVIΛ ΞN TIΞMPO RΞΛL</span>
                    <span style="font-size: 0.8em; color: #64748b; font-weight: 500;">(Se actualiza al instante mientras editas)</span>
                </div>
                <div id="live-preview-wrap" style="padding: 3rem; background: white; min-height: 150px; border-radius: 0 0 8px 8px; box-sizing: border-box;">
                    <div id="live-preview">
                        <!-- Rendered preview output -->
                    </div>
                </div>
            </div>
        </div>

                <script>
                    let blocks = [];

                    // Helper to compress an image using HTML5 Canvas
                    function compressImage(file, { maxWidth = 1600, maxHeight = 1600, quality = 0.8 } = {}) {
                        return new Promise((resolve) => {
                            if (!file || !file.type.startsWith('image/')) {
                                resolve(null);
                                return;
                            }

                            const reader = new FileReader();
                            reader.readAsDataURL(file);
                            reader.onload = (event) => {
                                const img = new Image();
                                img.src = event.target.result;
                                img.onload = () => {
                                    let width = img.width;
                                    let height = img.height;

                                    if (width > maxWidth || height > maxHeight) {
                                        if (width > height) {
                                            height = Math.round((height * maxWidth) / width);
                                            width = maxWidth;
                                        } else {
                                            width = Math.round((width * maxHeight) / height);
                                            height = maxHeight;
                                        }
                                    }

                                    const canvas = document.createElement('canvas');
                                    canvas.width = width;
                                    canvas.height = height;

                                    const ctx = canvas.getContext('2d');
                                    ctx.drawImage(img, 0, 0, width, height);

                                    canvas.toBlob((blob) => {
                                        if (!blob) {
                                            resolve(null);
                                            return;
                                        }
                                        
                                        const compressedFile = new File([blob], file.name.replace(/\.[^/.]+$/, "") + ".jpg", {
                                            type: 'image/jpeg',
                                            lastModified: Date.now()
                                        });
                                        
                                        resolve({
                                            file: compressedFile,
                                            originalSize: file.size,
                                            compressedSize: compressedFile.size
                                        });
                                    }, 'image/jpeg', quality);
                                };
                                img.onerror = () => resolve(null);
                            };
                            reader.onerror = () => resolve(null);
                        });
                    }

                    // Helper to format bytes to human readable sizes
                    function formatBytes(bytes, decimals = 2) {
                        if (bytes === 0) return '0 Bytes';
                        const k = 1024;
                        const dm = decimals < 0 ? 0 : decimals;
                        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                        const i = Math.floor(Math.log(bytes) / Math.log(k));
                        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
                    }

                    // Initialize with a paragraph block if we are creating a new article and content is empty
                    document.addEventListener('DOMContentLoaded', () => {
                        const contentTextarea = document.getElementById('content');
                        const initialHtml = contentTextarea.value.trim();
                        
                        if (initialHtml) {
                            blocks = parseHtmlToBlocks(initialHtml);
                        } else {
                            // Start with an empty paragraph block
                            blocks = [{ type: 'p', value: '' }];
                        }
                        
                        renderBlocks();
                        syncBlocksToHtml();
                        
                        // Listen to category changes to dynamic color the preview border left
                        const categorySelect = document.getElementById('category');
                        if (categorySelect) {
                            categorySelect.addEventListener('change', updatePreviewBorderColor);
                            updatePreviewBorderColor();
                        }

                        // Setup Cover Image/Thumbnail compression on change
                        const thumbnailInput = document.getElementById('thumbnail');
                        const thumbnailStats = document.getElementById('thumbnail-stats');
                        if (thumbnailInput && thumbnailStats) {
                            thumbnailInput.addEventListener('change', async (e) => {
                                const file = e.target.files[0];
                                if (!file) {
                                    thumbnailStats.style.display = 'none';
                                    return;
                                }

                                thumbnailStats.style.display = 'block';
                                thumbnailStats.style.color = '#ffa608';
                                thumbnailStats.innerHTML = '⏳ Optimizando imagen...';

                                const result = await compressImage(file, { maxWidth: 1200, maxHeight: 1200, quality: 0.8 });
                                if (result) {
                                    // Replace the file list in the input
                                    const dataTransfer = new DataTransfer();
                                    dataTransfer.items.add(result.file);
                                    thumbnailInput.files = dataTransfer.files;

                                    const reduction = ((result.originalSize - result.compressedSize) / result.originalSize * 100).toFixed(1);
                                    thumbnailStats.style.color = '#10b981';
                                    thumbnailStats.innerHTML = `✅ Portada optimizada: <strong>${formatBytes(result.compressedSize)}</strong> (Reducido de ${formatBytes(result.originalSize)}, -${reduction}%)`;
                                } else {
                                    thumbnailStats.style.color = '#ef4444';
                                    thumbnailStats.innerHTML = '⚠️ No se pudo comprimir la imagen (se enviará el archivo original).';
                                }
                            });
                        }
                    });

                    function renderBlocks() {
                        const container = document.getElementById('blocks-container');
                        container.innerHTML = '';
                        
                        if (blocks.length === 0) {
                            container.innerHTML = `
                                <div style="text-align: center; padding: 2.5rem 0; color: #64748b;">
                                    <p style="margin: 0 0 0.5rem; font-weight: 600; font-size: 1rem;">No hay bloques de contenido todavía.</p>
                                    <span style="font-size: 0.85rem;">Haz clic en los botones superiores para añadir párrafos, subtítulos, citas o imágenes.</span>
                                </div>
                            `;
                            return;
                        }
                        
                        blocks.forEach((block, index) => {
                            const blockDiv = document.createElement('div');
                            blockDiv.className = `block-item block-handle-${block.type}`;
                            blockDiv.setAttribute('data-index', index);
                            
                            let typeLabel = '';
                            let inputHtml = '';
                            
                            if (block.type === 'p') {
                                typeLabel = '📝 PÁRRΛFO';
                                inputHtml = `
                                    <div contenteditable="true" 
                                         oninput="updateBlockValue(${index}, this.innerHTML)" 
                                         class="contenteditable-editor" 
                                         placeholder="Escribe el párrafo aquí..." 
                                         style="width: 100%; min-height: 80px; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 4px; font-family: 'usual', sans-serif; font-size: 0.95rem; box-sizing: border-box; line-height: 1.6; background: white; text-align: left;"
                                    >${block.value}</div>
                                `;
                            } else if (block.type === 'h2') {
                                typeLabel = '🏷️ SUBTÍTULO (H2)';
                                inputHtml = `
                                    <input type="text" 
                                           oninput="updateBlockValue(${index}, this.value)" 
                                           value="${escapeHtmlAttr(block.value)}" 
                                           placeholder="Escribe el subtítulo destacado aquí..." 
                                           style="width: 100%; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 4px; font-family: 'usual', sans-serif; font-size: 1rem; font-weight: 700; box-sizing: border-box; background: white;"
                                    >`;
                            } else if (block.type === 'blockquote') {
                                typeLabel = '💬 CITΛ DΞTΛCΛDΛ';
                                inputHtml = `
                                    <div contenteditable="true" 
                                         oninput="updateBlockValue(${index}, this.innerHTML)" 
                                         class="contenteditable-editor" 
                                         placeholder="Escribe la cita célebre aquí..." 
                                         style="width: 100%; min-height: 60px; padding: 0.8rem; border: 1px solid #cbd5e1; border-radius: 4px; font-family: 'usual', sans-serif; font-size: 1.1rem; font-style: italic; color: #475569; box-sizing: border-box; background: white; text-align: left;"
                                    >${block.value}</div>
                                `;
                            } else if (block.type === 'image') {
                                typeLabel = '📷 IMΛGΞN DΞL ΛRTÍCULO';
                                const hasImage = block.value ? true : false;
                                
                                inputHtml = `
                                    <div style="width: 100%;">
                                        <input type="file" accept="image/*" onchange="uploadImageBlock(this, ${index})" style="display: none;" id="file-input-${index}">
                                        
                                        <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                                            <button type="button" onclick="document.getElementById('file-input-${index}').click()" style="background: #ffa608; color: white; border: none; padding: 0.6rem 1.2rem; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.85rem; box-shadow: 0 2px 4px rgba(255,166,8,0.15); transition: transform 0.1s;" onmousedown="this.style.transform='scale(0.97)'" onmouseup="this.style.transform='scale(1)'">
                                                📁 Subir Imagen
                                            </button>
                                            <span class="upload-status" style="font-size: 0.85rem; font-weight: 600; color: ${hasImage ? '#10b981' : '#64748b'};">
                                                ${hasImage ? '✅ Imagen cargada' : '⚠️ Sin imagen seleccionada'}
                                            </span>
                                        </div>
                                        
                                        <div class="image-preview-container">
                                            ${hasImage ? `
                                                <div style="margin-top: 1rem; position: relative; border-radius: 4px; overflow: hidden; border: 1px solid #cbd5e1; max-width: 300px;">
                                                    <img src="${block.value}" style="width: 100%; display: block; max-height: 200px; object-fit: cover;">
                                                </div>
                                            ` : ''}
                                        </div>
                                    </div>
                                `;
                            }
                            
                            blockDiv.innerHTML = `
                                <!-- Controls -->
                                <div class="block-controls">
                                    <button type="button" class="block-btn" onclick="moveBlock(${index}, -1)" title="Subir bloque">▲</button>
                                    <button type="button" class="block-btn" onclick="moveBlock(${index}, 1)" title="Bajar bloque">▼</button>
                                    <button type="button" class="block-btn block-btn-delete" onclick="deleteBlock(${index})" title="Eliminar bloque" style="margin-top: 8px;">🗑️</button>
                                </div>
                                
                                <!-- Content Area -->
                                <div style="flex-grow: 1; width: calc(100% - 45px);">
                                    <div style="font-size: 0.75rem; font-weight: 700; color: #64748b; margin-bottom: 0.6rem; letter-spacing: 0.1em;">
                                        ${typeLabel}
                                    </div>
                                    ${inputHtml}
                                </div>
                            `;
                            
                            container.appendChild(blockDiv);
                        });
                    }

                    function addBlock(type) {
                        blocks.push({ type: type, value: '' });
                        renderBlocks();
                        syncBlocksToHtml();
                    }

                    function deleteBlock(index) {
                        if (confirm('¿Estás seguro de que deseas eliminar este bloque de contenido?')) {
                            blocks.splice(index, 1);
                            renderBlocks();
                            syncBlocksToHtml();
                        }
                    }

                    function moveBlock(index, direction) {
                        const newIndex = index + direction;
                        if (newIndex < 0 || newIndex >= blocks.length) return;
                        
                        const temp = blocks[index];
                        blocks[index] = blocks[newIndex];
                        blocks[newIndex] = temp;
                        
                        renderBlocks();
                        syncBlocksToHtml();
                    }

                    function updateBlockValue(index, val) {
                        blocks[index].value = val;
                        syncBlocksToHtml();
                    }

                    async function uploadImageBlock(inputElement, index) {
                        const file = inputElement.files[0];
                        if (!file) return;

                        const blockDiv = document.querySelector(`[data-index="${index}"]`);
                        const statusText = blockDiv.querySelector('.upload-status');
                        const previewContainer = blockDiv.querySelector('.image-preview-container');
                        
                        // Indicate optimization status
                        statusText.textContent = "⏳ Optimizando imagen...";
                        statusText.style.color = "#ffa608";
                        
                        let uploadFile = file;
                        let sizeInfo = '';

                        const result = await compressImage(file, { maxWidth: 1600, maxHeight: 1600, quality: 0.8 });
                        if (result) {
                            uploadFile = result.file;
                            const reduction = ((result.originalSize - result.compressedSize) / result.originalSize * 100).toFixed(1);
                            sizeInfo = ` (Optimizado: ${formatBytes(result.compressedSize)}, -${reduction}%)`;
                        }
                        
                        // Indicate uploading status
                        statusText.textContent = `⏳ Subiendo imagen...${sizeInfo}`;
                        statusText.style.color = "#2563eb";
                        
                        const formData = new FormData();
                        formData.append('image', uploadFile);
                        formData.append('_token', document.querySelector('input[name="_token"]').value);

                        fetch('{{ route("admin.prensa.upload-image") }}', {
                            method: 'POST',
                            body: formData
                        })
                        .then(res => {
                            if (!res.ok) throw new Error("Error en la respuesta del servidor");
                            return res.json();
                        })
                        .then(data => {
                            if (data.success) {
                                statusText.textContent = `✅ Imagen cargada correctamente${sizeInfo}`;
                                statusText.style.color = "#10b981";
                                
                                blocks[index].value = data.url;
                                
                                previewContainer.innerHTML = `
                                    <div style="margin-top: 1rem; position: relative; border-radius: 4px; overflow: hidden; border: 1px solid #cbd5e1; max-width: 300px;">
                                        <img src="${data.url}" style="width: 100%; display: block; max-height: 200px; object-fit: cover;">
                                    </div>
                                `;
                                
                                syncBlocksToHtml();
                            } else {
                                statusText.textContent = "❌ Error: " + (data.message || "No se pudo subir.");
                                statusText.style.color = "#ef4444";
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            statusText.textContent = "❌ Error al subir. Formato inválido o supera los 5MB.";
                            statusText.style.color = "#ef4444";
                        });
                    }

                    function syncBlocksToHtml() {
                        let compiledHtml = '';
                        
                        blocks.forEach(block => {
                            if (!block.value || !block.value.trim()) return;
                            
                            if (block.type === 'p') {
                                compiledHtml += `<p>${block.value}</p>\n`;
                            } else if (block.type === 'h2') {
                                compiledHtml += `<h2>${block.value}</h2>\n`;
                            } else if (block.type === 'blockquote') {
                                compiledHtml += `<blockquote>${block.value}</blockquote>\n`;
                            } else if (block.type === 'image') {
                                compiledHtml += `<div class="article-inline-image"><img src="${block.value}" alt="Imagen del artículo"></div>\n`;
                            }
                        });
                        
                        document.getElementById('content').value = compiledHtml;
                        renderLivePreview(compiledHtml);
                    }

                    function renderLivePreview(html) {
                        const preview = document.getElementById('live-preview');
                        if (!html.trim()) {
                            preview.innerHTML = `
                                <div style="text-align: center; color: #94a3b8; padding: 2rem 0; font-family: 'usual', sans-serif;">
                                    <span style="font-size: 1.5rem; display: block; margin-bottom: 0.5rem;">✍️</span>
                                    <span>Agrega bloques y escribe contenido para ver la previsualización aquí.</span>
                                </div>
                            `;
                            return;
                        }
                        
                        preview.innerHTML = html;
                        updatePreviewBorderColor();
                    }

                    function updatePreviewBorderColor() {
                        const categorySelect = document.getElementById('category');
                        const category = categorySelect ? categorySelect.value : 'construccion';
                        
                        let color = '#ffa608';
                        if (category === 'maritimo') color = '#2563eb';
                        if (category === 'infraestructura') color = '#10b981';
                        if (category === 'ferroviario') color = '#ef4444';
                        
                        const bqs = document.querySelectorAll('#live-preview blockquote');
                        bqs.forEach(bq => {
                            bq.style.borderLeftColor = color;
                        });
                    }

                    function parseHtmlToBlocks(html) {
                        const temp = document.createElement('div');
                        temp.innerHTML = html;
                        const parsed = [];
                        
                        Array.from(temp.childNodes).forEach(node => {
                            if (node.nodeType === Node.ELEMENT_NODE) {
                                const tag = node.tagName.toLowerCase();
                                if (tag === 'p') {
                                    parsed.push({ type: 'p', value: node.innerHTML.trim() });
                                } else if (tag === 'h2') {
                                    parsed.push({ type: 'h2', value: node.innerHTML.trim() });
                                } else if (tag === 'blockquote') {
                                    parsed.push({ type: 'blockquote', value: node.innerHTML.trim() });
                                } else if (tag === 'div' && (node.classList.contains('article-inline-image') || node.querySelector('img'))) {
                                    const img = node.querySelector('img');
                                    if (img) parsed.push({ type: 'image', value: img.getAttribute('src') });
                                } else if (tag === 'img') {
                                    parsed.push({ type: 'image', value: node.getAttribute('src') });
                                } else {
                                    // Fallback to text inside paragraph
                                    parsed.push({ type: 'p', value: node.outerHTML });
                                }
                            } else if (node.nodeType === Node.TEXT_NODE && node.textContent.trim()) {
                                parsed.push({ type: 'p', value: node.textContent.trim() });
                            }
                        });
                        
                        return parsed;
                    }

                    function escapeHtmlAttr(string) {
                        if (!string) return '';
                        return string
                            .replace(/&/g, '&amp;')
                            .replace(/"/g, '&quot;')
                            .replace(/'/g, '&#39;')
                            .replace(/</g, '&lt;')
                            .replace(/>/g, '&gt;');
                    }
                </script>

            </form>

        </div>
    </div>
</div>
@endsection
