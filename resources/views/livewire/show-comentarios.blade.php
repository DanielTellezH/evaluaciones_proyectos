@if ( $this->observaciones->count() > 0 )    
    <div class="p-5">
        <h1 class="text-2xl font-bold text-center mt-4 mb-5">
            Observaciones realizadas
        </h1>
        @foreach ($this->observaciones as $observacion)
            <div class="p-5 border border-gray-200 md:flex justify-between items-center">
                <div>
                    <p class="font-bold text-lg">
                        Observación número {{ $loop->iteration }}
                    </p>
                    <p class="mt-3 mb-10">
                        <span class="font-bold text-gray-600 text-sm">
                            {{ $observacion->observacion }}
                        </span>
                    </p>
                    <p class="text-sm">
                        Observación de:
                        <span class="font-bold text-gray-600 text-sm underline">
                            {{ $observacion->user->name }}
                        </span>
                    </p>
                    {{-- <p class="text-sm">
                        Rol:
                        <span class="font-bold text-gray-600 text-sm underline">
                            {{ $observacion->user->esquema_id->descripcion }}
                        </span>
                    </p> --}}
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="w-full flex items-center flex-col">
        <h2 class="text-xl font-bold mt-20">
            No hay observaciones realizados aún
        </h2>
        <a href="{{ route('proyecto.index') }}" class="text-lg text-ipn underline my-5">
            Regresar
        </a>
    </div>
@endif