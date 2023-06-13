@extends('layouts.app')

@section('titulo')
    @switch( auth()->user()->esquema_id )
        @case(1)
            Calificar entrega
        @break
        @case(2)
            Realizar observación
        @break                
        @case(3)
            Realizar evaluación
        @break                
    @endswitch
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center mt-10 mb-10">
        @switch( auth()->user()->esquema_id )
            @case(1)
                Calificar entrega
            @break
            @case(2)
                Realizar observación
            @break                
            @case(3)
                Realizar evaluación
            @break                
        @endswitch
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
