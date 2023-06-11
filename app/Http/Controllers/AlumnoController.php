<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Integrante;

use Illuminate\Http\Request;

class AlumnoController extends Controller{
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


        return view('proyecto.index', compact('proyecto'));
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno){
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno){
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno){
        //
    }
}
