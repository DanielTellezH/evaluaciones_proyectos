@if ( $this->entregas->count() > 0 )    
    <div class="p-5">
        @can('create', App\Models\Proyecto::class)
            <h1 class="text-2xl font-bold text-center mt-4 mb-5">Entregas realizadas</h1>
        @endcan
        @cannot('create', App\Models\Proyecto::class)
            <h1 class="text-lg font-bold text-center mt-4 mb-5">{{ $proyecto->titulo }}</h1>
        @endcannot
        @foreach ($this->entregas as $entrega)
            <div class="p-5 border border-gray-200 md:flex justify-between items-center">
                <div>
                    <p class="font-bold text-lg">
                        @switch( $entrega->num_entrega )
                            @case( 1 )
                                Primer entrega
                            @break
                            @case( 2 )
                                Segunda entrega
                            @break
                            @case( 3 )
                                Tercer entrega
                            @break
                        @endswitch
                    </p>
                    <p class="mt-3 mb-10">
                        <span class="font-bold text-gray-600 text-sm">
                            {{ $entrega->comentarios }}
                        </span>
                    </p>
                    @if ( $entrega->atrasado )
                        <p class="text-sm">
                            <span class="font-bold text-red-600 text-sm underline">
                                Entrega extemporánea
                            </span>
                        </p>
                    @endif
                    @if ( $entrega->calificacion )
                        <p class="text-sm">
                            Calificación:
                            <span class="font-bold text-gray-600 text-sm underline">
                                {{ $entrega->calificacion }}
                            </span>
                        </p>
                    @endif
                    <p class="text-sm">
                        Entregado por:
                        <span class="font-bold text-gray-600 text-sm">
                            {{ $entrega->user->name }}
                        </span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-col">
                    @can('create', App\Models\Proyecto::class)
                        <a href="{{ route('proyecto.entrega.comentarios', $entrega->id ) }}" class="bg-ipn py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                            Ver observaciones
                        </a>
                    @endcan
                    @cannot('create', App\Models\Proyecto::class)
                        @if ( $entrega->calificacion and auth()->user()->esquema_id == 1 )
                            <a href="{{ route('proyectos.calificar', $entrega->id) }}" class="bg-ipn py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                Ver calificación
                            </a>
                        @else

                            @if ( auth()->user()->esquema_id != 3 )
                                <a href="{{ route('proyectos.calificar', $entrega->id) }}" class="bg-ipn py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                    @if ( auth()->user()->esquema_id == 1 )
                                        Calificar
                                    @endif
                                    @if ( auth()->user()->esquema_id == 2 )
                                        Observaciones
                                    @endif
                                </a>
                            @else
                                @if ( $entrega->num_entrega == 3 )
                                    @if ( $proyecto->estatus == null )
                                        <a href="{{ route('proyectos.calificar', $entrega->id) }}" class="bg-ipn py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                            Evaluar
                                        </a>
                                    @else
                                        @if ( $proyecto->estatus )
                                            <p class="bg-blue-400 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                                Aprobado
                                            </p>
                                        @else
                                            <p class="bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                                Rechazado
                                            </p>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endcannot
                    <a href="{{ asset( 'storage/entregas/presentaciones/' . $entrega->presentacion ) }}" class="p-2 px-4 rounded-lg text-xs text-center font-bold uppercase cursor-pointer" style="position: relative; top: 8px;">
                        Descargar presentación
                    </a>
                    @if ( $entrega->tesina )
                        <a href="{{ asset( 'storage/entregas/tesinas/' . $entrega->tesina ) }}" class="p-2 px-4 rounded-lg text-xs text-center font-bold uppercase cursor-pointer" style="position: relative; top: 8px;">
                            Descargar tesina
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="w-full flex items-center flex-col">
        @cannot('create', App\Models\Proyecto::class)
            <h2 class="text-xl font-bold mt-20">
                No hay entregas realizadas aún
            </h2>
            <a href="{{ route('proyectos.index') }}" class="text-lg text-ipn underline my-5">
                Regresar
            </a>
        @endcannot
    </div>
@endif