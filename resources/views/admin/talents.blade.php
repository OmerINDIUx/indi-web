@extends('layouts.app')

@section('title', 'CMS - Bandeja de Talento')

@section('content')
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 1200px; margin: 0 auto;">
        
        <div style="background: white; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 8px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <h1 class="indi-heading" style="font-size: 2rem; margin: 0; color: var(--indi-dark);">
                    BΛNDEJΛ DE <span style="color: var(--indi-blue);">TΛLENTO</span>
                </h1>
                <a href="{{ route('admin.dashboard') }}" style="background: #eee; color: #333; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; font-family: 'Inter', sans-serif;">&larr; Volver al Panel</a>
            </div>

            <div style="overflow-x: auto; font-family: 'Inter', sans-serif;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: #f1f5f9; color: #334155; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 1.2rem; font-weight: 600;">Fecha</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Nombre</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Contacto</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Área</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Mensaje</th>
                            <th style="padding: 1.2rem; font-weight: 600;">CV</th>
                        </tr>
                    </thead>
                    <tbody style="color: #475569;">
                        @forelse($talents ?? [] as $talent)
                            <tr style="border-bottom: 1px solid #e2e8f0; vertical-align: top;">
                                <td style="padding: 1.2rem;">{{ $talent->created_at->format('d/m/Y H:i') }}</td>
                                <td style="padding: 1.2rem; font-weight: 500; color: #0f172a;">{{ $talent->name }}</td>
                                <td style="padding: 1.2rem;">
                                    <a href="mailto:{{ $talent->email }}" style="color: var(--indi-blue); text-decoration: none;">{{ $talent->email }}</a><br>
                                    <span style="font-size: 0.9em; color: #64748b;">{{ $talent->phone }}</span>
                                </td>
                                <td style="padding: 1.2rem;">
                                    <span style="background: #e0f2fe; color: #0284c7; padding: 0.3rem 0.8rem; border-radius: 12px; font-size: 0.85em; font-weight: 600;">{{ $talent->area_of_interest ?: 'General' }}</span>
                                </td>
                                <td style="padding: 1.2rem; max-width: 300px;">
                                    <p style="margin: 0; font-size: 0.9em; line-height: 1.5;">{{ Str::limit($talent->message, 80) }}</p>
                                </td>
                                <td style="padding: 1.2rem;">
                                    @if($talent->resume_path)
                                        <a href="{{ route('admin.cv.download', basename($talent->resume_path)) }}" target="_blank" style="background: #10b981; color: white; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; font-size: 0.85em; font-weight: 600;">Descargar</a>
                                    @else
                                        <span style="color: #94a3b8; font-size: 0.85em;">Sin CV</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="padding: 3rem; text-align: center; color: #64748b;">No hay solicitudes de talento registradas aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
