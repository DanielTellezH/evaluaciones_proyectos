<?php

namespace App\Http\Livewire;

use App\Models\Entrega;

use Livewire\Component;

class ShowEntregas extends Component{

    protected $listeners = ['actualizarEntregas'];

    public $proyecto;
    
    public $entregas;

    public function mount(){
        $this->entregas = $this->proyecto->load('entregas.user')->entregas()->latest()->get();
    }

    public function actualizarEntregas(){
        $this->proyecto->refresh(); 
        $this->entregas = $this->proyecto->load('entregas.user')->entregas()->latest()->get();
        $this->emit('$refresh'); 
    }

    public function render(){
        return view('livewire.show-entregas');
    }
}
