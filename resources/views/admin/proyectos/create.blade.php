@extends('layouts.app')

@section('title', 'CMS - Nuevo Proyecto')

@section('content')
<div class="indi-section-wrap" style="padding-top: 15rem; min-height: 80vh; background: #f9fafb;">
    <div class="indi-container" style="max-width: 1200px; margin: 0 auto;">
        <div style="background: white; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-radius: 8px; font-family: 'usual', sans-serif;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem; border-bottom: 1px solid #eee; padding-bottom: 2rem;">
                <h1 class="indi-heading" style="font-size: 2rem; margin: 0; color: var(--indi-dark);">NUEVO <span style="color: #64b032;">PROYECTO</span></h1>
                <a href="{{ route('admin.proyectos.index') }}" style="background: #eee; color: #333; padding: 0.8rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600;">&larr; Volver</a>
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

            <form method="POST" action="{{ route('admin.proyectos.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.proyectos._form')
            </form>
        </div>
    </div>
</div>
@endsection
