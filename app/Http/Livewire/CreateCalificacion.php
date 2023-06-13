<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateCalificacion extends Component{

    public $entrega;

    public $estatus;
    public $calificacion;
    public $observaciones;
    
    public $calificado = false;
    public $calificacion_bd = '';
    public $observacion = '';

    protected $rules = [
        'observaciones' => 'nullable|string',
    ];

    // Nuevas reglas de validación

    public function rules(){
        $rules_extra = [
            'calificacion' => 'required|numeric|max:10',
        ];
        $rules_extra_2 = [
            'estatus' => 'required|string|max:2',
        ];

        if ( auth()->user()->esquema_id == 1 ) {
            return $rules_extra + $this->rules;
        } 
        if ( auth()->user()->esquema_id == 3 ) {
            return $rules_extra_2 + $this->rules;
        } 
        if ( auth()->user()->esquema_id == 2 ) {
            return $this->rules;
        }
    }

    public function mount(){
        if( auth()->user()->esquema_id == 1 ){
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
        if( auth()->user()->esquema_id == 2 or auth()->user()->esquema_id == 3 ){
            $observacion = $this->entrega->observaciones->firstWhere('user_id', auth()->id());

            if ($observacion) {
                $this->observacion = $observacion->observacion;
                if( auth()->user()->esquema_id == 2 ){
                    $this->calificado = true;
                }
            } else {
                $this->observacion = null;
            }
        }
        if( auth()->user()->esquema_id == 3 ){
            $proyecto = $this->entrega->proyecto;

            // Actualizamos la calificación de la entrega
            if( $proyecto->estatus != null ){
                $this->calificado = true;
            }
        }
    }

    public function store(){
        $datos = $this->validate();

        if( auth()->user()->esquema_id == 1 ){
            // Actualizamos la calificación de la entrega
            $this->entrega->calificacion = $this->calificacion;
            $this->entrega->save();
        }

        if( auth()->user()->esquema_id == 3 ){
            $proyecto = $this->entrega->proyecto;

            // Actualizamos la calificación de la entrega
            $proyecto->estatus = ( $this->estatus == "SI" ) ? true : false;
            $proyecto->save();
        }

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
