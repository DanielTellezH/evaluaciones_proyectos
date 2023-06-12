<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Integrante;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AlumnoController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('esquema.creador')->except('index');
        $this->middleware('esquema.alumno');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){

        $proyecto = auth()->user()->proyecto;

        if( ! $proyecto ){
            // Buscar al usuario autenticado en el modelo Integrante
            $integrante = Integrante::where('user_id', auth()->id())->first();
    
            // El usuario es un integrante, obtener el proyecto asignado
            $proyecto = $integrante->proyecto;
        }

        // Logica de las entregas

        $fechaEntrega = null;
        $fechaLimite = null;
        $entregable = null;

        $numEntregas = $proyecto->entregas->count();

        switch ( $numEntregas ) {
            case 0:
                $fechaLimite    = $proyecto->fecha_entrega ? $proyecto->fecha_entrega->format('YmdHis') : null;
                $fechaEntrega = $proyecto->fecha_entrega ? $proyecto->fecha_entrega->format('d/m/Y h:i A') : null;
            break;
            case 1:
                $fechaLimite    = $proyecto->fecha_entrega_2 ? $proyecto->fecha_entrega_2->format('YmdHis') : null;
                $fechaEntrega = $proyecto->fecha_entrega_2 ? $proyecto->fecha_entrega_2->format('d/m/Y h:i A') : null;
            break;
            case 2:
                $fechaLimite    = $proyecto->fecha_entrega_3 ? $proyecto->fecha_entrega_3->format('YmdHis') : null;
                $fechaEntrega = $proyecto->fecha_entrega_3 ? $proyecto->fecha_entrega_3->format('d/m/Y h:i A') : null;
            break;
        }

        $hoy = Carbon::now()->timezone('America/Mexico_City');
        $hoy = $hoy->format('YmdHis');

        $entregable = ($hoy <= $fechaLimite) ? true : false;      
        

        $context = [
            'proyecto' => $proyecto,
            'fechaLimite' => $fechaLimite,
            'fechaEntrega' => $fechaEntrega,
            'entregable' => $entregable,
            'entregas' => $numEntregas,
        ];

        return view('proyecto.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $proyecto = auth()->user()->proyecto;

        return view('proyecto.create', compact('proyecto'));
    }
    
    /**
     * Muestra la sección para agregar integrantes o asesores.
     */
    public function integrantes(){
        $proyecto = auth()->user()->proyecto;

        return view('proyecto.integrantes', compact('proyecto'));
    }
}
