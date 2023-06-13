<?php

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;

class CreateSinodales extends Component{

    protected $listeners = ['actualizarListaSinodales'];

    public $proyecto;
    
    public $sinodales;
    public $sinodal;

    public function mount(){

        $proyectoId = $this->proyecto->id;

        $this->sinodales = User::where('esquema_id', 3)
            ->whereNotIn('id', function ($query) use ($proyectoId) {
                $query->select('user_id')
                    ->from('sinodales')
                    ->where('proyecto_id', $proyectoId);
            })
            ->select('id', 'name')
            ->get();
    }

    public function actualizarListaSinodales(){
        $proyectoId = $this->proyecto->id;

        $this->sinodales = User::where('esquema_id', 3)
            ->whereNotIn('id', function ($query) use ($proyectoId) {
                $query->select('user_id')
                    ->from('sinodales')
                    ->where('proyecto_id', $proyectoId);
            })
            ->select('id', 'name')
            ->get();
    }

    public function rules(){

        $rules = [
            'sinodal' => 'required|numeric',
        ];
    
        $this->rules = $rules;
    
        return $this->rules;
    }

    public function store(){
        $datos = $this->validate();

        // Se crea el registro
        $this->proyecto->sinodales()->create([
            'user_id' => $this->sinodal
        ]);

        // Se vacía el formulario
        $this->sinodal = null;

        // Se emite evento para actualizar sinodal
        $this->emit('actualizarSinodales');

        // Se emite mensaje de success
        session()->flash('sinodalAgregado', true);

        // Redirección
        return redirect()->back();
    }

    public function render(){
        return view('livewire.create-sinodales');
    }
}
