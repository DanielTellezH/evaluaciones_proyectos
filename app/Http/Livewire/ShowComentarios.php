<?php

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;

class ShowComentarios extends Component{

    public $entrega;

    public $observaciones;

    public function mount(){
        $this->observaciones = $this->entrega->observaciones;
    }

    public function render(){
        return view('livewire.show-comentarios');
    }
}
