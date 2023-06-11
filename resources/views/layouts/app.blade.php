<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | @yield('titulo')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        {{-- Estilos extra --}}
        @livewireStyles

        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @hasSection('titulo')
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            @yield('titulo')
                        </h2>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @hasSection('mensaje')
                            <div class="uppercase border text-sm border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
                                @yield('mensaje')
                            </div>
                        @endif
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            @yield('contenido')
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Scripts -->
        @livewireScripts

        @stack('scripts')
    </body>
</html>
