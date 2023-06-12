@extends('layouts.app')

@section('titulo')
    Asignar fechas
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center mt-10 mb-10">
        Asignar fechas al proyecto
    </div>

    <livewire:create-fechas :proyecto="$proyecto" />

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
