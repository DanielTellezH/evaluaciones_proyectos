@extends('layouts.app')

@section('titulo')
    Calificar entrega
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center mt-10 mb-10">
        Calificar entrega
    </div>

    <livewire:create-calificacion :entrega="$entrega" />

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
