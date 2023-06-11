<form wire:submit.prevent="store" class="md:w-1/2 space-y-5">
    <!-- Título del proyecto -->
    <div>
        <x-input-label for="titulo" :value="__('Título del proyecto')" />
        <x-textarea-input wire:model="titulo" id="titulo" placeholder="Escribe el título del proyecto" class="h-40 block mt-1 w-full" autofocus />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    {{-- Crear proyecto o eliminar --}}
    <div class="flex justify-between">
        <x-primary-button>
            @if ($isEdit)
                {{ __('Editar proyecto') }}   
            @else
                {{ __('Crear proyecto') }}
            @endif
        </x-primary-button>
        @if ($isEdit)
            <x-primary-button type="button" wire:click="$emit('btn_eliminarProyecto', { id: {{ $proyecto->id }} } )" class="!bg-transparent !text-red-600 !font-bold !text-sm">
                {{ __('Eliminar proyecto') }}   
            </x-primary-button>
        @endif
    </div>
</form>