<form wire:submit.prevent="store" enctype="multipart/form-data" class="md:w-1/2 space-y-5">

    <!-- Sinodal -->
    <div class="mt-4">
        <x-input-label for="sinodal" :value="__('Sinodal')" />
        <select wire:model="sinodal" id="sinodal" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
            <option value="">Selecciona una sinodal </option>
            @foreach ($sinodales as $sinodal)
                <option value="{{ $sinodal->id }}">{{ $sinodal->name }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('sinodal')" class="mt-2" />
    </div>

        {{-- Botón de guardar --}}
    <x-primary-button class="!mt-10">
        {{ __('Guardar sinodal') }}   
    </x-primary-button>
</form>
