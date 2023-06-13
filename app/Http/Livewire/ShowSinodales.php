<?php

namespace App\Http\Livewire;

use App\Models\Sinodal;

use Livewire\Component;

class ShowSinodales extends Component{

    protected $listeners = ['actualizarSinodales', 'eliminarSinodal'];

    public $proyecto;

    public $objetos;

    public function mount(){
        $this->objetos = $this->proyecto->load('sinodales.user')->sinodales;
    }

    public function actualizarSinodales(){
        $this->proyecto->refresh(); 
        $this->objetos = $this->proyecto->load('sinodales.user')->sinodales;
        $this->emit('$refresh'); 
    }

    public function eliminarSinodal(Sinodal $sinodal){
        $sinodal->delete();

        session()->flash('sinodalEliminado', true);

        $this->emit('actualizarSinodales');

        // Se emite evento para actualizar sinodal
        $this->emit('actualizarListaSinodales');

        return redirect()->back();        
    }
    
    public function render(){
        return view('livewire.show-sinodales');
    }
}
