@extends('layouts.app')

@section('titulo')
    Agregar integrantes
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center my-10 mx-40">
        {{ $proyecto->titulo }}
    </div>
    <div class="md:flex md:justify-center py-5 mb-10">
        <livewire:create-integrantes :proyecto="$proyecto" />
    </div>
@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    {{-- Estilos adicionales --}}
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}
@endpush
