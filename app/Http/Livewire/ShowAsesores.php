<?php

namespace App\Http\Livewire;

use App\Models\Asesor;

use Livewire\Component;

class ShowAsesores extends Component{

    protected $listeners = ['actualizarAsesores', 'eliminarAsesor'];

    public $proyecto;

    public $objetos;

    public function mount(){
        $this->objetos = $this->proyecto->load('asesores.user')->asesores;
    }

    public function actualizarAsesores(){
        $this->proyecto->refresh(); 
        $this->objetos = $this->proyecto->load('asesores.user')->asesores;
        $this->emit('$refresh'); 
    }

    public function eliminarAsesor(Asesor $asesor){
        $asesor->delete();

        session()->flash('asesorEliminado', true);

        $this->emit('actualizarAsesores');

        return redirect()->back();        
    }

    public function render(){
        return view('livewire.show-asesores');
    }
}
