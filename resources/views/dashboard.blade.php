@extends('layouts.app')

@section('titulo')
    Inicio
@endsection

@section('contenido')
    <div class="text-2xl font-bold text-center mt-16 mb-10">
        Bienvenido al sistema de evaluación de proyectos de ingeniería
    </div>
    <div class="text-lg px-36 bold font-medium text-justify mt-16 mb-10">
        Este sistema está diseñado para gestionar y evaluar proyectos, con el objetivo de agilizar estos procesos. Los alumnos 
        podrán crear un proyecto y añadir integrantes del equipo y asesores, subir sus avances en cada departamental, añadir 
        comentarios y, también, visualizar las observaciones realizadas por sus profesores de la materia del "Proyecto de 
        Ingeniería", sus asesores y, finalmente, los sinodales asignados a su proyecto.
        <br><br>
        Los profesores de la materia de "Proyecto de Ingeniería" podrán asignar fechas límite para las entregas de los trabajos, 
        evaluar los proyectos y proporcionar observaciones constructivas.
        <br>
        Los asesores, por su parte, podrán revisar cada proyecto que tengan asignado y proporcionar observaciones sobre cada 
        entrega realizada por los alumnos.
        <br>
        Finalmente, los sinodales podrán ver los proyectos que tengan asignados, tendrán la posibilidad de revisar la última 
        versión de los trabajos de los alumnos y realizar una evaluación final que determinará si el proyecto ha sido aprobado o no.
    </div>

    {{-- <livewire:show-proyectos /> --}}

@endsection

{{-- ========================================= --}}
{{-- Estilos y scripts adicionales --}}

@push('styles')
    {{-- Estilos adicionales --}}
@endpush

@push('scripts')
    {{-- Scripts adicionales --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush