<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateIntegrantes extends Component{

    public $proyecto;

    public $tipo_miembro;

    public $integrantes;
    public $asesores;

    public function tipoChange(){
        if ($this->tipo_miembro === 'integrante') {
            // Hacer algo
        }
        if ($this->tipo_miembro === 'asesor') {
            // Hacer algo
        }
    }

    public function render(){
        return view('livewire.create-integrantes');
    }
}
