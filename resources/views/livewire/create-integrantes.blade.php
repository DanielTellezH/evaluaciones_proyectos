<form wire:submit.prevent="store" enctype="multipart/form-data" class="md:w-1/2 space-y-5">

    <!-- Tipo de miembro -->
    <div class="mt-4">
        <x-input-label for="tipo_miembro" :value="__('Tipo de miembro')" />
        <select wire:model="tipo_miembro" wire:change="tipoChange" id="tipo_miembro" class="border-gray-300 rounded-md shadow-sm w-full mt-1">
            <option value="">Selecciona un tipo de miembro </option>
            <option value="integrante">Integrante </option>
            <option value="asesor">Asesor</option>
        </select>
        <x-input-error :messages="$errors->get('tipo_miembro')" class="mt-2" />
    </div>
    
    {{-- <!-- Integrante -->
    <div class="mt-4">
        <x-input-label for="integrante" :value="__('Integrante')" />
        <select name="integrante" id="integrante" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
            <option value="">Selecciona una integrante </option>
            @foreach ($integrantes as $integrante)
                <option value="{{ $integrante->id }}">{{ $integrante->descripcion }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('integrante')" class="mt-2" />
    </div>

    <!-- Nombre -->
    <div class="mt-4">
        <x-input-label for="nombre" :value="__('Nombre')" />
        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" maxlength="5" :value="old('nombre')" />
        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
    </div> --}}

    {{-- Botón de guardar --}}
    <x-primary-button>
        {{ __('Guardar integrante') }}   
    </x-primary-button>
</form>
