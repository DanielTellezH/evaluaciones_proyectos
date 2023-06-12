@extends('layouts.app')

@section('titulo')
    Realizar entregas del proyecto
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center mt-10 mb-10">
        Realizar entregas del proyecto
    </div>

    <div class="bg-white shadow-sm p-6 border border-gray-200 divide-y divide-gray-200">
        <div class="md:flex md:justify-between md:items-center py-5 bg-gray-50 border border-gray-200 p-5">
            <div class="md:flex-1">
                <h3 class="text-2xl font-extrabold text-gray-600">
                    @switch( $entregas )
                        @case( 0 )
                            Primer departamental
                        @break
                        @case( 1 )
                            Segundo departamental
                        @break
                        @case( 2 )
                            Tercer departamental
                        @break
                        @case( 3 )
                            Entregas completadas
                        @break
                    @endswitch
                </h3>
                <p class="text-base text-gray-600 mt-4 mb-10 w-10/12">
                    {{ $proyecto->titulo }}
                </p>
                @if ( $entregas < 3 )
                    <p class="text-sm text-gray-600 mb-3">
                        Último día de entrega:
                        @if ( $fechaEntrega )
                            {{-- <span class="font-bold">{{ $fechaEntrega->diffForHumans() }}</span> --}}
                            <span class="font-bold">{{ $fechaEntrega }}</span>
                            @if ( ! $entregable )
                                <span class="font-bold text-red-600 uppercase pl-4">Entrega extemporánea</span>
                            @endif
                        @else
                            <span class="font-bold">Pendiente de asignar</span>
                        @endif
                    </p>
                @endif
                <p class="text-sm text-gray-600 mb-3">
                    Líder del proyecto:
                    <span class="font-bold">{{ $proyecto->user->name }}</span>
                </p>

                @if ( $fechaLimite )
                    <livewire:create-entrega :proyecto="$proyecto" :entregable="$entregable" :entregas="$entregas" />
                @endif
            </div>
        </div>
    </div>

    <livewire:show-entregas :proyecto="$proyecto" />

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
