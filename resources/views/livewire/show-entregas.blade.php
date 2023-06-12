@if ( $this->entregas->count() > 0 )    
    <div class="p-5">
        <h1 class="text-2xl font-bold text-center mt-4 mb-5">Entregas realizadas</h1>
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
                    <p class="mt-3">
                        <span class="font-bold text-gray-600 text-sm">
                            {{ $entrega->comentarios }}
                        </span>
                    </p>
                    <p class="mt-10 text-sm">
                        Entregado por:
                        <span class="font-bold text-gray-600 text-sm">
                            {{ $entrega->user->name }}
                        </span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-col">
                    <a href="#" class="bg-ipn py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Ver observaciones
                    </a>
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
    <div></div>
@endif
