<?php

namespace App\Http\Livewire;

use App\Models\Proyecto;

use Livewire\Component;

class ShowProyectos extends Component{

    public $proyectos;

    public function mount(){
        $this->proyectos = Proyecto::all();
    }

    public function render(){
        return view('livewire.show-proyectos');
    }
}
