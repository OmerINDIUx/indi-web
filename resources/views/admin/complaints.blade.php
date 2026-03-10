@extends('layouts.app')

@section('title', 'CMS - Quejas y Denuncias')

@section('content')
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 1200px; margin: 0 auto;">
        
        <div style="background: white; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 8px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <h1 class="indi-heading" style="font-size: 2rem; margin: 0; color: var(--indi-dark);">
                    QUEJΛS Y <span style="color: #e74c3c;">DENUNCIΛS</span>
                </h1>
                <a href="{{ route('admin.dashboard') }}" style="background: #eee; color: #333; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; font-family: 'Inter', sans-serif;">&larr; Volver al Panel</a>
            </div>

            <div style="overflow-x: auto; font-family: 'Inter', sans-serif;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: #f1f5f9; color: #334155; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 1.2rem; font-weight: 600;">Fecha</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Contacto</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Tipo</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Descripción</th>
                            <th style="padding: 1.2rem; font-weight: 600;">Evidencia</th>
                        </tr>
                    </thead>
                    <tbody style="color: #475569;">
                        @forelse($complaints ?? [] as $complaint)
                            <tr style="border-bottom: 1px solid #e2e8f0; vertical-align: top;">
                                <td style="padding: 1.2rem;">{{ $complaint->created_at->format('d/m/Y H:i') }}</td>
                                <td style="padding: 1.2rem; font-weight: 500;">
                                    @if($complaint->name || $complaint->email || $complaint->phone)
                                        <div style="color: #0f172a; font-weight: 600;">{{ $complaint->name ?? 'Anónimo' }}</div>
                                        <div style="color: var(--indi-blue); font-size: 0.9em;">{{ $complaint->email }}</div>
                                        <div style="color: #64748b; font-size: 0.9em;">{{ $complaint->phone }}</div>
                                    @else
                                        <span style="background: #1e293b; color: white; padding: 0.3rem 0.8rem; border-radius: 12px; font-size: 0.85em; font-weight: 600;">Reporte Anónimo</span>
                                    @endif
                                </td>
                                <td style="padding: 1.2rem;">
                                    @php
                                        $typeStyles = [
                                            'queja' => 'background: #fef3c7; color: #d97706;',
                                            'denuncia' => 'background: #fee2e2; color: #dc2626;',
                                            'sugerencia' => 'background: #e0f2fe; color: #0284c7;',
                                        ];
                                        $style = $typeStyles[$complaint->type] ?? 'background: #eee; color: #555;';
                                    @endphp
                                    <span style="{{ $style }} padding: 0.3rem 0.8rem; border-radius: 12px; font-size: 0.85em; font-weight: 600; text-transform: capitalize;">
                                        {{ $complaint->type }}
                                    </span>
                                </td>
                                <td style="padding: 1.2rem; max-width: 400px;">
                                    <p style="margin: 0; font-size: 0.9em; line-height: 1.5; white-space: pre-wrap;">{{ $complaint->description }}</p>
                                </td>
                                <td style="padding: 1.2rem;">
                                    @if($complaint->evidence_path)
                                        <a href="{{ route('admin.evidencia.download', basename($complaint->evidence_path)) }}" target="_blank" style="background: #10b981; color: white; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; font-size: 0.85em; font-weight: 600;">Ver Evidencia</a>
                                    @else
                                        <span style="color: #94a3b8; font-size: 0.85em;">Sin adjunto</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="padding: 3rem; text-align: center; color: #64748b;">No hay reportes registrados aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
