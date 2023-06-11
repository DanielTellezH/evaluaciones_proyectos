<?php

namespace App\Http\Livewire;

use App\Models\Integrante;
use Livewire\Component;

class ShowIntegrantes extends Component{

    protected $listeners = ['actualizarIntegrantes', 'eliminarIntegrante'];

    public $proyecto;

    public $objetos;

    public function mount(){
        $this->objetos = $this->proyecto->load('integrantes.user')->integrantes;
    }

    public function actualizarIntegrantes(){
        $this->proyecto->refresh(); 
        $this->objetos = $this->proyecto->load('integrantes.user')->integrantes;
        $this->emit('$refresh'); 
    }

    public function eliminarIntegrante(Integrante $integrante){
        $integrante->delete();

        session()->flash('integranteEliminado', true);

        $this->emit('actualizarIntegrantes');
        $this->emit('actualizarConteo');

        return redirect()->back();        
    }

    public function render(){
        return view('livewire.show-integrantes');
    }
}
