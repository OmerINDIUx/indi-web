@extends('layouts.app')

@section('title', 'Quejas y Denuncias | GRUPO INDI')

@section('content')
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 800px; margin: 0 auto;">
        
        <div style="background: white; padding: 5rem; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border-radius: 8px;">
            <div style="text-align: center; margin-bottom: 4rem;">
                <h1 class="indi-heading" style="font-size: 3rem; margin-bottom: 1rem; color: var(--indi-dark);">
                    CΛNΛL DE <span style="color: #e74c3c;">DENUNCIΛS</span>
                </h1>
                <p style="font-family: 'Inter', sans-serif; font-size: 1.2rem; color: #666; max-width: 650px; margin: 0 auto;">
                    Espacio confidencial para reportar cualquier anomalía o queja relacionada con nuestras operaciones, colaboradores o proyectos. Puedes reportarlo de manera anónima si así lo deseas.
                </p>
            </div>

            @if(session('success'))
                <div style="background: #dcfce7; color: #166534; padding: 1.5rem; border-radius: 4px; margin-bottom: 3rem; font-family: 'Inter', sans-serif; font-weight: 500; text-align: center;">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('quejas.store') }}" enctype="multipart/form-data" style="font-family: 'Inter', sans-serif;">
                @csrf
                
                <div style="background: #f8f9fa; border-left: 4px solid var(--indi-blue); padding: 1.5rem; margin-bottom: 3rem; border-radius: 0 8px 8px 0;">
                    <p style="margin: 0; font-size: 0.95rem; color: #444; line-height: 1.6;">
                        <strong>Nota de Privacidad:</strong> Si lo deseas, puedes dejar tus datos de contacto vacíos para hacer una denuncia anónima. Sin embargo, proporcionar un correo o teléfono nos permitirá dar un seguimiento más efectivo.
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Nombre Completo (Opcional)</label>
                        <input type="text" name="name" style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa;">
                        @error('name') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Correo Electrónico (Opcional)</label>
                        <input type="email" name="email" style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa;">
                        @error('email') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Teléfono (Opcional)</label>
                        <input type="text" name="phone" style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa;">
                        @error('phone') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Tipo de Reporte *</label>
                        <select name="type" required style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa;">
                            <option value="queja">Queja / Inconformidad</option>
                            <option value="denuncia">Denuncia de acto ilícito o ético</option>
                            <option value="sugerencia">Sugerencia de mejora</option>
                        </select>
                        @error('type') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div style="margin-bottom: 3rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Descripción de los Hechos *</label>
                    <textarea name="description" rows="6" required style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa; resize: vertical;" placeholder="Proporciona el mayor detalle posible (quién, qué, cuándo, dónde)..."></textarea>
                    @error('description') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Evidencia (Opcional - Imagen, PDF, DOC)</label>
                    <input type="file" name="evidence_path" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" style="width: 100%; padding: 1rem; border: 1px dashed #bbb; border-radius: 4px; background: #fafafa; cursor: pointer;">
                    @error('evidence_path') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <button type="submit" style="width: 100%; padding: 1.2rem; background: #e74c3c; color: white; border: none; border-radius: 4px; font-weight: 700; font-size: 1.2rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.1em; transition: background 0.3s ease;">
                    Enviar Reporte Seguro
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
