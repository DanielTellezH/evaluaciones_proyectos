<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Proyecto;

use Illuminate\Http\Request;

class AdminController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('esquema.profesor')->except('entregas', 'calificar');
        $this->middleware('entregas.middleware')->only('entregas', 'calificar');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
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
     * Display the specified resource.
     */
    public function sinodales(Proyecto $proyecto){
        return view('proyectos.sinodales', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function calificar(Entrega $entrega){
        return view('proyectos.calificar', compact('entrega'));
    }

}
