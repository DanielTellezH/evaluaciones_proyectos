<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateCalificacion extends Component{

    public $entrega;

    public $calificacion;
    public $observaciones;
    
    public $calificado = false;
    public $calificacion_bd = '';
    public $observacion = '';

    protected $rules = [
        'calificacion' => 'required|numeric|max:10',
        'observaciones' => 'nullable|string',
    ];

    public function mount(){
        if( $this->entrega->calificacion ){
            $this->calificacion_bd = $this->entrega->calificacion;
            $observacion = $this->entrega->observaciones->firstWhere('user_id', auth()->id());

            if ($observacion) {
                $this->observacion = $observacion->observacion;
            } else {
                $this->observacion = null;
            }
            $this->calificado = true;
        }
    }

    public function store(){
        $datos = $this->validate();

        // Actualizamos la calificación de la entrega
        $this->entrega->calificacion = $this->calificacion;
        $this->entrega->save();

        // Almacenamos el comentario 

        if( $datos['observaciones'] ){
            $this->entrega->observaciones()->create([
                'observacion' => $datos['observaciones'],
                'user_id' => auth()->id(),
            ]);
        }

        // Enviamos comentario
        session()->flash('evaluacionRealizada', true);

        // Retornamos
        return redirect()->route('proyectos.entregas', $this->entrega->proyecto->hashname );

    }

    public function render(){
        return view('livewire.create-calificacion');
    }
}
