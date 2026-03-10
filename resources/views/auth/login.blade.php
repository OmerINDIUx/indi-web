@extends('layouts.app')

@section('title', 'Iniciar Sesión | GRUPO INDI')

@section('content')
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 500px; margin: 0 auto;">
        
        <div style="background: white; padding: 4rem; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border-radius: 8px;">
            <h2 class="indi-heading" style="font-size: 2rem; margin-bottom: 2rem; text-align: center; color: var(--indi-dark);">
                CMS <span style="color: var(--indi-blue);">INDI</span>
            </h2>

            @if($errors->any())
                <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 4px; margin-bottom: 2rem; font-family: 'Inter', sans-serif;">
                    <ul style="margin: 0; padding-left: 1rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" style="font-family: 'Inter', sans-serif;">
                @csrf
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                </div>

                <div style="margin-bottom: 2.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: #333;">Contraseña</label>
                    <input type="password" name="password" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                </div>

                <button type="submit" style="width: 100%; padding: 1rem; background: var(--indi-blue); color: white; border: none; border-radius: 4px; font-weight: 600; font-size: 1.1rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.1em; transition: background 0.3s ease;">
                    Ingresar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
