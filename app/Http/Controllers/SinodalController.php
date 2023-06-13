<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Sinodal;

use Illuminate\Http\Request;

class SinodalController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('entregas.middleware');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        // Obtener el ID del sinodal autenticado
        $sinodalId = auth()->id();

        // Obtener los proyecto_id del sinodal autenticado
        $proyectoIds = Sinodal::where('user_id', $sinodalId)->pluck('proyecto_id');

        // Obtener los proyectos correspondientes a los proyecto_id
        $proyectos = Proyecto::whereIn('id', $proyectoIds)->get();

        return view('proyectos.index', compact('proyectos'));
    }
}
