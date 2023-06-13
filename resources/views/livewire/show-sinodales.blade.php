<div>
    @forelse ($this->objetos as $objeto)
        <div class="text-gray-900 md:flex md:justify-between md:items-center mt-2">
            <div class="space-y-3">
                <p>
                    <span class="font-bold pl-1">{{ $loop->iteration }}.-</span> {{ $objeto->user->name }}
                </p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch text-center mt-4 md:mt-0">
                @if ( $objeto->user->id != auth()->id() )
                    <button wire:click="$emit('btn_eliminarSinodal', { id: {{ $objeto->id }}, name: '{{ $objeto->user->name }}' } )" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Eliminar
                    </button>
                @endif
            </div>
        </div>
    @empty
        <p class="font-bold pl-4 text-gray-900">
            No hay sinodales por el momento
        </p>
    @endforelse

    @if ( session()->get('sinodalAgregado') )
        <script>
            Swal.fire(
                '¡Listo!',
                'Se agregó el sinodal correctamente.',
                'success',
            )
        </script>
    @endif

    @if ( session()->get('sinodalEliminado') )
        <script>
            Swal.fire(
                '¡Listo!',
                'Se eliminó el sinodal correctamente.',
                'success',
            )
        </script>
    @endif
</div>
