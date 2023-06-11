<?php

namespace App\Http\Livewire;

use App\Models\Asesor;
use App\Models\Integrante;
use App\Models\Proyecto;
use App\Models\User;

use Livewire\Component;

class CreateIntegrantes extends Component{

    public $proyecto;

    public $tipo_miembro;
    public $integrante;
    public $asesor;

    public $integrantesConteo;
    public $integrantes;
    public $asesores;

    // Nuevas reglas de validación

    protected $listeners = ['actualizarConteo'];

    public function rules(){

        $rules = [];

        if ($this->tipo_miembro === 'integrante') {
            $rules = [
                'integrante' => 'required|numeric',
            ];
        }
        if ($this->tipo_miembro === 'asesor') {
            $rules = [
                'asesor' => 'required|numeric',
            ];
        }
    
        $this->rules = $rules;
    
        return $this->rules;
    }

    public function mount(){
        // Obtenemos el conteo actualizado de los integrantes
        $this->integrantesConteo = $this->proyecto->integrantes()->count();
    }

    public function actualizarConteo(){
        // Obtenemos el conteo actualizado de los integrantes
        $this->integrantesConteo = $this->proyecto->integrantes()->count();
    }

    public function tipoChange(){
        
        if ($this->tipo_miembro === 'integrante') {
            $this->integrantes = User::where('esquema_id', 4)
                ->where('id', '<>', auth()->id())
                ->whereNotIn('id', function ($query) {
                    $query->select('user_id')
                        ->from('integrantes');
                })
                ->select('id', 'name')
                ->get();
            $this->asesor = null;
            $this->asesores = null;
        }
        if ($this->tipo_miembro === 'asesor') {
            $this->asesores = User::where('esquema_id', 2)
                ->whereNotIn('id', function ($query) use ($proyectoId) {
                    $query->select('user_id')
                        ->from('asesores')
                        ->where('proyecto_id', $proyectoId);
                })
                ->select('id', 'name')
                ->get();
            $this->integrante = null;
            $this->integrantes = null;
        }
    }

    public function store(){
        $datos = $this->validate();

        if ($this->tipo_miembro === 'integrante') {
            // Se crea el registro
            $this->proyecto->integrantes()->create([
                'user_id' => $this->integrante
            ]);

            // Obtenemos el conteo actualizado de los integrantes
            $this->integrantesConteo = $this->proyecto->integrantes()->count();

            // Se vacía el formulario
            $this->integrante = null;
            $this->integrantes = null;

            // Se emite evento para actualizar integrantes
            $this->emit('actualizarIntegrantes');
        }
        if ($this->tipo_miembro === 'asesor') {
            // Se crea el registro
            $this->proyecto->asesores()->create([
                'user_id' => $this->asesor
            ]);

            // Se vacía el formulario
            $this->asesor = null;
            $this->asesores = null;

            // Se emite evento para actualizar asesores
            $this->emit('actualizarAsesores');
        }

        $this->tipo_miembro = null;
    }

    public function render(){
        return view('livewire.create-integrantes');
    }
}
