@extends('layouts.app')

@section('title', 'Buscamos Talento | GRUPO INDI')

@section('content')
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 800px; margin: 0 auto;">
        
        <div style="background: white; padding: 5rem; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border-radius: 8px;">
            <div style="text-align: center; margin-bottom: 4rem;">
                <h1 class="indi-heading" style="font-size: 3rem; margin-bottom: 1rem; color: var(--indi-dark);">
                    ÚNETE Λ <span style="color: var(--indi-blue);">INDI</span>
                </h1>
                <p style="font-family: 'Inter', sans-serif; font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto;">
                    Forma parte del equipo que está construyendo el futuro de México. Compártenos tus datos y nos pondremos en contacto contigo.
                </p>
            </div>

            @if(session('success'))
                <div style="background: #dcfce7; color: #166534; padding: 1.5rem; border-radius: 4px; margin-bottom: 3rem; font-family: 'Inter', sans-serif; font-weight: 500; text-align: center;">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('talento.store') }}" enctype="multipart/form-data" style="font-family: 'Inter', sans-serif;">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Nombre Completo *</label>
                        <input type="text" name="name" required style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa;">
                        @error('name') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Correo Electrónico *</label>
                        <input type="email" name="email" required style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa;">
                        @error('email') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Teléfono</label>
                        <input type="text" name="phone" style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa;">
                        @error('phone') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Área de Interés</label>
                        <select name="area_of_interest" style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa;">
                            <option value="">Selecciona un área</option>
                            <option value="Construcción">Construcción</option>
                            <option value="Ingeniería">Ingeniería</option>
                            <option value="Marítimo">Marítimo</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('area_of_interest') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Adjunta tu CV (PDF, DOCX)</label>
                    <input type="file" name="resume_path" accept=".pdf,.doc,.docx" style="width: 100%; padding: 1rem; border: 1px dashed #bbb; border-radius: 4px; background: #fafafa; cursor: pointer;">
                    @error('resume_path') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 3rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Mensaje Adicional</label>
                    <textarea name="message" rows="4" style="width: 100%; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fafafa; resize: vertical;"></textarea>
                    @error('message') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <button type="submit" style="width: 100%; padding: 1.2rem; background: var(--indi-blue); color: white; border: none; border-radius: 4px; font-weight: 700; font-size: 1.2rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.1em; transition: background 0.3s ease;">
                    Enviar Solicitud
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
