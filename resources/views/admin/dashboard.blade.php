@extends('layouts.app')

@section('title', 'CMS Dashboard | GRUPO INDI')

@section('content')
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 1200px; margin: 0 auto;">
        
        <div style="background: white; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 8px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem; border-bottom: 1px solid #eee; padding-bottom: 2rem;">
                <h1 class="indi-heading" style="font-size: 2.5rem; margin: 0; color: var(--indi-dark);">
                    CMS <span style="color: var(--indi-blue);">PΛNEL</span>
                </h1>
                <div>
                    <span style="font-family: 'Inter', sans-serif; font-weight: 500; color: #555; margin-right: 1.5rem;">Bienvenido, {{ auth()->user() ? auth()->user()->name : 'Admin' }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: transparent; border: 1px solid #ddd; color: #555; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer; font-family: 'Inter'; font-weight: 600;">Cerrar Sesión</button>
                    </form>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 4rem;">
                
                <!-- Tarjeta Talentos -->
                <div style="border: 1px solid #eaeaea; padding: 2.5rem; border-radius: 6px; text-align: center; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <div style="font-size: 2.5rem; color: var(--indi-blue); margin-bottom: 1rem;">👥</div>
                    <h3 style="font-family: 'Syncopate', sans-serif; font-size: 1.2rem; color: #111; margin-bottom: 1rem;">TΛLENTO INDI</h3>
                    <p style="font-family: 'Inter', sans-serif; color: #666; margin-bottom: 2rem;">Gestiona las solicitudes de empleo y currículums recibidos.</p>
                    <a href="{{ route('admin.talento.index') }}" style="display: inline-block; background: var(--indi-blue); color: white; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; font-family: 'Inter', sans-serif; font-size: 0.9rem;">Ver Solicitudes</a>
                </div>

                <!-- Tarjeta Quejas -->
                <div style="border: 1px solid #eaeaea; padding: 2.5rem; border-radius: 6px; text-align: center; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <div style="font-size: 2.5rem; color: #e74c3c; margin-bottom: 1rem;">📢</div>
                    <h3 style="font-family: 'Syncopate', sans-serif; font-size: 1.2rem; color: #111; margin-bottom: 1rem;">QUEJΛS Y DENUNCIΛS</h3>
                    <p style="font-family: 'Inter', sans-serif; color: #666; margin-bottom: 2rem;">Revisa los reportes, quejas o denuncias confidenciales.</p>
                    <a href="{{ route('admin.quejas.index') }}" style="display: inline-block; background: #e74c3c; color: white; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; font-family: 'Inter', sans-serif; font-size: 0.9rem;">Ver Reportes</a>
                </div>
                
                <!-- Próximamente: Prensa -->
                <div style="border: 1px solid #eaeaea; padding: 2.5rem; border-radius: 6px; text-align: center; background: #fafafa; opacity: 0.7;">
                    <div style="font-size: 2.5rem; color: #888; margin-bottom: 1rem;">📰</div>
                    <h3 style="font-family: 'Syncopate', sans-serif; font-size: 1.2rem; margin-bottom: 1rem;">PRENSΛ (PRÓXIMΛMENTE)</h3>
                    <p style="font-family: 'Inter', sans-serif; color: #888; margin-bottom: 2rem;">Módulo para subir y editar nuevos blogs de prensa.</p>
                    <span style="display: inline-block; background: #ccc; color: white; padding: 0.8rem 1.5rem; border-radius: 4px; font-weight: 600; font-family: 'Inter', sans-serif; font-size: 0.9rem;">En Construcción</span>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
