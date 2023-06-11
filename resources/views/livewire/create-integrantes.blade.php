<form wire:submit.prevent="store" enctype="multipart/form-data" class="md:w-1/2 space-y-5">

    <!-- Tipo de miembro -->
    <div class="mt-4">
        <x-input-label for="tipo_miembro" :value="__('Tipo de miembro')" />
        <select wire:model="tipo_miembro" wire:change="tipoChange" id="tipo_miembro" class="border-gray-300 rounded-md shadow-sm w-full mt-1">
            <option value="">Selecciona un tipo de miembro </option>
            @if ( $integrantesConteo < 4 )
                <option value="integrante">Integrante </option>
            @endif
            <option value="asesor">Asesor</option>
        </select>
        <x-input-error :messages="$errors->get('tipo_miembro')" class="mt-2" />
    </div>

    @if ( $integrantes )
        <!-- Integrante -->
        <div class="mt-4">
            <x-input-label for="integrante" :value="__('Integrante')" />
            <select wire:model="integrante" id="integrante" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                <option value="">Selecciona una integrante </option>
                @foreach ($integrantes as $integrante)
                    <option value="{{ $integrante->id }}">{{ $integrante->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('integrante')" class="mt-2" />
        </div>
    @endif
    
    @if ( $asesores )
        <!-- Asesores -->
        <div class="mt-4">
            <x-input-label for="asesor" :value="__('Asesores')" />
            <select wire:model="asesor" id="asesor" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                <option value="">Selecciona una asesor </option>
                @foreach ($asesores as $asesor)
                    <option value="{{ $asesor->id }}">{{ $asesor->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('asesor')" class="mt-2" />
        </div>
    @endif

    @if ( $integrantes or $asesores )
        {{-- Botón de guardar --}}
        <x-primary-button class="!mt-10">
            @if ( $integrantes )
                {{ __('Guardar integrante') }}   
            @endif
            @if ( $asesores )
                {{ __('Guardar asesor') }}   
            @endif
        </x-primary-button>
    @endif
</form>
