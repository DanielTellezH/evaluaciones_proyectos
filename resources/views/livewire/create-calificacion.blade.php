<form wire:submit.prevent="store" novalidate enctype="multipart/form-data" class="mt-12 bg-white p-8 border border-gray-300">
    <h3 class="font-bold text-xl text-gray-600 mb-6">
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
    </h3>
    @if ( auth()->user()->esquema_id == 1 )
        <div class="my-5 px-2">
            <x-input-label for="calificacion" :value="__('Calificación')" />
            @if ( $calificado )
                <p class="block mt-1 w-full pl-4">
                    {{ $calificacion_bd }}
                </p>
            @else
                <x-text-input wire:model="calificacion" id="calificacion" type="number" placeholder="Agregar calificacion" class="block mt-1 w-full" autofocus />
                <x-input-error :messages="$errors->get('calificacion')" />
            @endif
        </div>
    @endif
    @if ( auth()->user()->esquema_id == 3 )
        @if ( ! $calificado )
            <!-- Estatus -->
            <div class="my-5 px-2">
                <x-input-label for="estatus" :value="__('Evaluación final')" />
                <select wire:model="estatus" id="estatus" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                    <option value="">Selecciona una estatus </option>
                    <option value="SI">Aprobado</option>
                    <option value="NO">Rechazado</option>
                </select>
                <x-input-error :messages="$errors->get('estatus')" class="mt-2" />
            </div>
        @endif
    @endif
    <!-- Observaciones -->
    <div class="my-5 px-2">
        <x-input-label for="observaciones" :value="__('Observaciones')" />
        @if ( auth()->user()->esquema_id == 1 )
            @if ( $calificado )
                <p class="block mt-1 w-full pl-4">
                    {{ $observacion }}
                </p>
            @else
                <x-textarea-input wire:model="observaciones" id="observaciones" placeholder="Agregar observaciones" class="h-40 block mt-1 w-full" />
                <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
            @endif
        @endif
        @if ( auth()->user()->esquema_id == 2 or auth()->user()->esquema_id == 3 )
            @if ( $observacion )
                <p class="block mt-1 w-full pl-4">
                    {{ $observacion }}
                </p>
            @else
                <x-textarea-input wire:model="observaciones" id="observaciones" placeholder="Agregar observaciones" class="h-40 block mt-1 w-full" />
                <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
            @endif
        @endif
    </div>
    {{-- Botón de guardar --}}
    <div>
        @if ( ! $calificado and auth()->user()->esquema_id == 1 )
            <x-primary-button class="!mx-2 !my-2">
                Calificar entrega
            </x-primary-button>
        @endif
        @switch( auth()->user()->esquema_id )
            @case(2)
                @if ( ! $calificado )
                    <x-primary-button class="!mx-2 !my-2">
                        Realizar observación
                    </x-primary-button>
                @endif
            @case(3)
                @if ( ! $calificado )
                    <x-primary-button class="!mx-2 !my-2">
                        Evaluar proyecto
                    </x-primary-button>
                @endif
            @break                
        @endswitch
        <a href="{{ route('proyectos.entregas', $entrega->proyecto->hashname ) }}" class="!mx-2 !my-2 underline">
            {{ __('Regresar') }}   
        </a>
    </div>
</form>