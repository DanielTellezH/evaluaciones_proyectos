@extends('layouts.app')

@section('titulo')
    Evaluar proyectos
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center mt-10 mb-10">
        Proyectos registrados
    </div>

    <livewire:show-proyectos />

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
