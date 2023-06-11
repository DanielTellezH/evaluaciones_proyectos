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

    <div class="w-full md:flex mt-14 border-t-2 border-gray-400">
        <div class="md:w-1/2 py-6 px-12">
            <div>
                <h3 class="text-xl font-bold mb-5">
                    Integrantes
                </h3>
                <livewire:show-integrantes :proyecto="$proyecto" />
            </div>
        </div>
        <div class="md:w-1/2 py-6 px-12">
            <div>
                <h3 class="text-xl font-bold mb-5">
                    Asesores
                </h3>
                <livewire:show-asesores :proyecto="$proyecto" />
            </div>
        </div>
    </div>

@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    {{-- Estilos adicionales --}}
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Eliminar integrantes
        Livewire.on('btn_eliminarIntegrante', ({ id, name }) => {
            Swal.fire({
                title: '¿Eliminar integrante?',
                text: "Si eliminas el integrante, no lo podrás recuperar.",
                footer: name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarIntegrante', id);                 
                }
            })
        });
        // Eliminar asesor
        Livewire.on('btn_eliminarAsesor', ({ id, name }) => {
            Swal.fire({
                title: '¿Eliminar asesor?',
                text: "Si eliminas el asesor, no lo podrás recuperar.",
                footer: name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarAsesor', id);                 
                }
            })
        });
    </script>
@endpush
