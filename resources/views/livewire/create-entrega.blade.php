@if ( ! $entregado )
    <form wire:submit.prevent="store" enctype="multipart/form-data" class="mt-12 bg-white p-8 border border-gray-300">
        <h3 class="font-bold text-xl text-gray-600 mb-6">
            Entregar avances
        </h3>
        <div class="my-5 px-2">
            <label for="presentacion" class="mb-2 text-sm block uppercase text-gray-500 font-bold pl-3">
                Presentación
            </label>
            <input wire:model="presentacion" id="presentacion" type="file" class="border p-1 w-full rounded-lg font-bold text-gray-600" accept="application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.presentation">
            <x-input-error :messages="$errors->get('presentacion')" />
        </div>
        <div class="my-5 px-2">
            <label for="tesina" class="mb-2 text-sm block uppercase text-gray-500 font-bold pl-3">
                Tesina
            </label>
            <input wire:model="tesina" id="tesina" type="file" class="border p-1 w-full rounded-lg font-bold text-gray-600" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf">
            <x-input-error :messages="$errors->get('tesina')" />
        </div>
        <!-- Comentarios -->
        <div class="my-5 px-2">
            <x-input-label for="comentarios" :value="__('Comentarios')" />
            <x-textarea-input wire:model="comentarios" id="comentarios" placeholder="Agregar comentarios" class="h-40 block mt-1 w-full" />
            <x-input-error :messages="$errors->get('comentarios')" class="mt-2" />
        </div>

        @if ( ! $entregable )
            <p class="m-3 font-bold text-red-600">
                El avance a entregar, será marcado como extemporáneo.
            </p>
        @endif

        <x-primary-button class="!mx-2 !my-2">
            {{ __('Realizar entrega') }}   
        </x-primary-button>
        
        

    </form>
@else
    <div>
        @if ( session()->get('entregaRealizada') )
            <script>
                Swal.fire(
                    '¡Entregado!',
                    'Tu entrega ha sido enviada correctamente.',
                    'success',
                )
            </script>
        @endif
    </div>
@endif