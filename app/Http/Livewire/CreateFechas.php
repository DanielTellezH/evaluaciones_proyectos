<?php

namespace App\Http\Livewire;

use Carbon\Carbon;

use Livewire\Component;

class CreateFechas extends Component{

    public $proyecto;

    public $fecha_1;
    public $fecha_2;
    public $fecha_3;

    protected $rules = [
        'fecha_1' => 'required|date',
        'fecha_2' => 'nullable',
        'fecha_3' => 'nullable',
    ];

    protected $messages = [
        'fecha_1.required' => 'La primer fecha de entrega debe estar seleccionada.',
    ];

    public function mount(){
        // $this->fecha_1 = ( $this->proyecto->fecha_entrega != "" ) ?? Carbon::parse($this->proyecto->fecha_entrega)->format('Y-m-d\TH:i:s');
        $this->fecha_1 = $this->proyecto->fecha_entrega ? Carbon::parse($this->proyecto->fecha_entrega)->format('Y-m-d\TH:i:s') : null;
        $this->fecha_2 = $this->proyecto->fecha_entrega_2 ? Carbon::parse($this->proyecto->fecha_entrega_2)->format('Y-m-d\TH:i:s') : null;
        $this->fecha_3 = $this->proyecto->fecha_entrega_3 ? Carbon::parse($this->proyecto->fecha_entrega_3)->format('Y-m-d\TH:i:s') : null;
    }
    
    public function store(){
        $datos = $this->validate();

        if ($datos['fecha_1']) {
            $this->proyecto->fecha_entrega = $datos['fecha_1'];
        }
        if ($datos['fecha_2']) {
            $this->proyecto->fecha_entrega_2 = $datos['fecha_2'];
        }
        if ($datos['fecha_3']) {
            $this->proyecto->fecha_entrega_3 = $datos['fecha_3'];
        }
    
        $this->proyecto->save();

        // Enviamos mensaje
        session()->flash('fechasActualizadas', true);

        // Retornamos 
        return redirect()->back();

    }

    public function render(){
        return view('livewire.create-fechas');
    }
}
