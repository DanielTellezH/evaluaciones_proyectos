<form wire:submit.prevent="store" novalidate enctype="multipart/form-data" class="mt-12 bg-white p-8 border border-gray-300">
    <h3 class="font-bold text-xl text-gray-600 mb-6">
        Calificar entrega
    </h3>
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
    <!-- Observaciones -->
    <div class="my-5 px-2">
        <x-input-label for="observaciones" :value="__('Observaciones')" />
        @if ( $calificado )
            <p class="block mt-1 w-full pl-4">
                {{ $observacion }}
            </p>
        @else
            <x-textarea-input wire:model="observaciones" id="observaciones" placeholder="Agregar observaciones" class="h-40 block mt-1 w-full" />
            <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
        @endif
    </div>
    {{-- Botón de guardar --}}
    <div>
        @if ( ! $calificado )
            <x-primary-button class="!mx-2 !my-2">
                {{ __('Realizar evaluación') }}   
            </x-primary-button>
        @endif
        <a href="{{ route('proyectos.entregas', $entrega->proyecto->hashname ) }}" class="!mx-2 !my-2 underline">
            {{ __('Regresar') }}   
        </a>
    </div>
</form>