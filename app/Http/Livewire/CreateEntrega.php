<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEntrega extends Component{

    use WithFileUploads;

    public $proyecto;
    public $entregable;
    public $entregado;
    public $entregas;

    public $presentacion;
    public $tesina;
    public $comentarios;

    protected $rules = [
        'presentacion' => 'required|mimetypes:application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'tesina' => 'nullable|mimes:doc,docx,pdf',
        'comentarios' => 'nullable',
    ];
    
    protected $messages = [
        'presentacion.required' => 'El archivo de presentación es obligatorio.',
        'presentacion.mimetypes' => 'El formato de archivo de la presentación no es válido. Debe ser un archivo de tipo ppt o pptx.',
        'tesina.mimes' => 'El formato de archivo de la tesina no es válido. Debe ser un archivo de tipo doc, docx o pdf.',
    ];

    public function mount(){
        $this->entregado = false;
    }

    public function store(){
        $datos = $this->validate();

        // Definición de variables

        $presentacion = null;
        $tesina = null;

        // Almacenar la presentacion del proyecto
        
        $presentacion = $this->presentacion->store('public/entregas/presentaciones');
        $presentacion = str_replace('public/entregas/presentaciones/', '', $presentacion);
        
        if( $this->tesina ){
            $tesina = $this->tesina->store('public/entregas/tesinas');
            $tesina = str_replace('public/entregas/tesinas/', '', $tesina);
        }

        // Almacenamos el registro en las entregas

        $this->proyecto->entregas()->create([
            'presentacion' => $presentacion,
            'tesina' => $tesina,
            'comentarios' => $datos['comentarios'],
            'user_id' => auth()->id(),
            'atrasado' => $this->entregable ? false : true,
            'num_entrega' => ($this->entregas + 1),
        ]);
        
        // Limpiamos formulario

        $this->presentacion = '';
        $this->tesina = '';
        $this->comentarios = null;
        $this->entregado = true;

        // Enviamos mensaje
        session()->flash('entregaRealizada', true);

        // Actualizamos tabla de entregas
        $this->emit('actualizarEntregas');

        // Retornamos 
        return redirect()->back();
    }

    public function render(){
        return view('livewire.create-entrega');
    }
}
