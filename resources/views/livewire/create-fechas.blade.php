<form wire:submit.prevent="store" enctype="multipart/form-data" novalidate class="mt-12 bg-white p-8 border border-gray-300">
    <!-- Primer fecha -->
    <div class="mt-4">
        <x-input-label for="fecha_1" :value="__('Primer fecha')" />
        <x-text-input wire:model="fecha_1" id="fecha_1" type="datetime-local" class="block mt-1 w-full" />
        <x-input-error :messages="$errors->get('fecha_1')" class="mt-2" />
    </div>
    <!-- Segunda fecha -->
    <div class="mt-4">
        <x-input-label for="fecha_2" :value="__('Segunda fecha')" />
        <x-text-input wire:model="fecha_2" id="fecha_2" type="datetime-local" class="block mt-1 w-full" />
        <x-input-error :messages="$errors->get('fecha_2')" class="mt-2" />
    </div>
    <!-- Tercer fecha -->
    <div class="mt-4">
        <x-input-label for="fecha_3" :value="__('Tercer fecha')" />
        <x-text-input wire:model="fecha_3" id="fecha_3" type="datetime-local" class="block mt-1 w-full" />
        <x-input-error :messages="$errors->get('fecha_3')" class="mt-2" />
    </div>

    <x-primary-button class="!my-6">
        {{ __('Actualizar fechas') }}   
    </x-primary-button>

    @if ( session()->get('fechasActualizadas') )
        <script>
            Swal.fire(
                'Actualizado!',
                'Las fechas de entrega han sido actualizadas.',
                'success',
            )
        </script>
    @endif

</form>