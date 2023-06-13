<?php

namespace App\Http\Controllers;

use App\Models\Asesor;

use Illuminate\Http\Request;

class AsesorController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        // $this->middleware('esquema.profesor');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        // Obtener el ID del asesor autenticado
        $asesorId = auth()->id();

        // Obtener los proyecto_id del asesor autenticado
        $proyectoIds = Asesor::where('asesor_id', $asesorId)->pluck('proyecto_id');

        // Obtener los proyectos correspondientes a los proyecto_id
        $proyectos = Proyecto::whereIn('id', $proyectoIds)->get();

        // Mostrar los proyectos
        dd($proyectos);

        return view('proyectos.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function entregas(Proyecto $proyecto){
        return view('proyectos.entregas', compact('proyecto'));
    }

    /**
     * Display the specified resource.
     */
    public function fechas(Proyecto $proyecto){
        return view('proyectos.fechas', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function calificar(Entrega $entrega){
        return view('proyectos.calificar', compact('entrega'));
    }
}
