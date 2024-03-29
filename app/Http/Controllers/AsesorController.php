<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Proyecto;

use Illuminate\Http\Request;

class AsesorController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('entregas.middleware');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        // Obtener el ID del asesor autenticado
        $asesorId = auth()->id();

        // Obtener los proyecto_id del asesor autenticado
        $proyectoIds = Asesor::where('user_id', $asesorId)->pluck('proyecto_id');

        // Obtener los proyectos correspondientes a los proyecto_id
        $proyectos = Proyecto::whereIn('id', $proyectoIds)->get();

        return view('proyectos.index', compact('proyectos'));
    }
}
