@extends('layouts.app')

@section('titulo')
    Realizar entregas del proyecto
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center mt-10 mb-10">
        Realizar entregas del proyecto
    </div>

    {{ dump($proyecto) }}

@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    {{-- Estilos adicionales --}}
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}
@endpush
