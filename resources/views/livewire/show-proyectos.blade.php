@if ( $proyectos->count() > 0 )    
    <div class="p-5">
        @foreach ($proyectos as $proyecto)
            <div class="p-5 border border-gray-200 md:flex justify-between items-center">
                <div>
                    <p class="font-bold text-lg">
                        Equipo número {{ $proyecto->id }}
                    </p>
                    <p class="mt-3 w-9/12">
                        <span class="font-bold text-gray-600 text-sm">
                            {{ $proyecto->titulo }}
                        </span>
                    </p>
                    <p class="mt-10 text-sm">
                        Líder del proyecto:
                        <span class="font-bold text-gray-600 text-sm">
                            {{ $proyecto->user->name }}
                        </span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-col">
                    <a href="{{ route('proyectos.entregas', $proyecto->hashname ) }}" class="bg-ipn py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Ver entregas
                    </a>
                    <a href="{{ route('proyectos.fechas', $proyecto->hashname) }}" class="p-2 px-4 rounded-lg text-xs text-center font-bold uppercase cursor-pointer" style="position: relative; top: 8px;">
                        Asignar fechas
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div>
        Aún no hay proyectos registrados
    </div>
@endif
