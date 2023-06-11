<?php

namespace App\Http\Livewire;

use App\Models\Proyecto;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateProyecto extends Component{

    // Variables para la modificación
    public $proyecto;
    public $proyecto_id = null;
    public $isEdit = false;

    public $titulo;

    protected $listeners = ['eliminarProyecto'];

    protected $rules = [
        'titulo' => 'required|string',
    ];

    public function mount($proyecto = null){
        if($proyecto){
            $this->proyecto_id = $proyecto->id;
            $this->titulo = $proyecto->titulo;
            $this->isEdit = true;
        }
    }

    public function store(){
        $datos = $this->validate();

        // Se crea el nombre para las URLs
        $hashName = Str::random(10);
        
        // Crear la vacante

        $attributes = [
            'titulo' => $datos['titulo'],
        ];
        
        if ( ! $this->proyecto_id ) {
            // En una inserción, completar el hashname
            $attributes['hashname'] = $hashName;
        }

        auth()->user()->proyecto()->updateOrCreate(
            ['id' => $this->proyecto_id], // Condiciones de búsqueda
            $attributes
        );

        // Redireccionar al usuario a los integrantes
        return redirect()->route('proyecto.integrantes');
    }
    
    public function eliminarProyecto(){
        $this->proyecto->delete();

        session()->flash('eliminado', true);

        return redirect()->route('proyecto.create');
    }

    public function render(){
        return view('livewire.create-proyecto');
    }
}
