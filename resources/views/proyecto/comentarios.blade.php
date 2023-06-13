@extends('layouts.app')

@section('titulo')
    Comentarios de la entrega
@endsection

@section('contenido')
    @if ( $entrega->calificacion )
        <div class="text-2xl font-bold text-center mt-10 mb-10">
                Calificación de {{ $entrega->calificacion }}
        </div>
    @endif

    <livewire:show-comentarios :entrega="$entrega" />

@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    {{-- Estilos adicionales --}}
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
