@extends('layouts.app')

@section('titulo')
    @if ( $proyecto )
        Editar proyecto
    @else
        Crear proyecto
    @endif
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center mt-10 mb-10">
        @if ( $proyecto )
            Editar proyecto de titulación
        @else
            Crear proyecto de titulación
        @endif
    </div>
    <div class="md:flex md:justify-center py-5 mb-10">
        <livewire:create-proyecto :proyecto="$proyecto" />
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
        Livewire.on('btn_eliminarProyecto', ({ id }) => {
            Swal.fire({
                title: '¿Eliminar proyecto?',
                text: "Si eliminas el proyecto, no lo podrás recuperar.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('eliminarProyecto');                 
                }
            })
        });
    </script>

    @if ( session()->get('eliminado') )
        <script>
            Swal.fire(
                '¡Listo!',
                'Se eliminó el proyecto correctamente.',
                'success',
            )
        </script>
    @endif

@endpush
