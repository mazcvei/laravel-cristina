@extends('layouts.plantilla')

@section('content')
<div class="container" style="margin-top: 50px; width: 800px;">
    <!-- Opciones de navegación -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Botón Volver -->
        <a href="{{ route('tableros.index') }}" class="btn btn-outline-primary">Volver</a>

        <!-- Buscador centrado -->
        <div class="flex-grow-1 d-flex justify-content-center">
            <form class="d-flex" style="max-width: 300px;">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" style="border-radius: 20px; height: 35px; font-size: 14px;">
            </form>
        </div>

        <!-- Botón Añadir contenido -->
        <a href="{{ route('contenidos.create', $tablero->id) }}" class="btn btn-primary">Añadir contenido</a>
    </div>

    <!-- Título del Tablero -->
    <div class="tablero-info" style="background-color: #3D99FF; padding: 20px; margin-bottom: 50px; color: white;">
        <h4 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 20px; text-align: center;">
            {{ strtoupper($tablero->nombre_tablero) }}
        </h4>
    </div>

    <!-- Sección de Contenidos -->
    @foreach ($tablero->contenidos as $contenido)
    <div class="contenido-seccion" style="margin-bottom: 40px; border: 1px solid #ccc; border-radius: 10px; overflow: hidden;">
        <!-- Título del Contenido -->
        <div class="contenido-header" style="background-color: #A4D77F; padding: 15px; display: flex; justify-content: space-between; align-items: center;">
            <h5 style="font-size: 20px; color: white; text-transform: uppercase; margin: 0;">{{ $contenido->titulo_contenido }}</h5>
            
            <!-- Menú desplegable para la sección -->
            <div class="dropdown">
                <button class="btn dropdown-toggle" style="background-color: white; border: none; color: #3D99FF; font-size: 20px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    &#8230; <!-- Tres puntos -->
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('contenidos.addSubcontent', $contenido->id) }}">Añadir subcontenido</a></li>
                    <li><a class="dropdown-item" href="#">Eliminar sección</a></li>
                </ul>
            </div>
        </div>

        <!-- Lista de URLs asociadas al contenido -->
        @foreach ($contenido->urls as $url)
        <div class="url-item" style="display: flex; padding: 15px; border-top: 1px solid #ddd; align-items: flex-start;">
            <!-- Foto -->
            <div style="width: 100px; margin-right: 15px;">
                <img src="{{ asset('storage/' . ($url->foto_url ? $url->foto_url : 'default_image.jpg')) }}" alt="Foto del contenido" style="width: 100%; border-radius: 5px;">
            </div>

            <!-- Detalles de URL y descripción -->
            <div style="flex-grow: 1;">
                <p style="margin: 0;"><strong>URL:</strong> <a href="{{ $url->url }}" target="_blank" style="color: #0000EE;">{{ $url->url }}</a></p>
                <p style="margin: 0; color: #555;"><strong>Descripción:</strong> {{ $url->descripcion_url }}</p>
            </div>

            <!-- Menú desplegable para el contenido -->
            <div class="dropdown" style="margin-left: 15px;">
                <button class="btn dropdown-toggle" style="background-color: white; border: none; color: #3D99FF; font-size: 20px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    &#8230; <!-- Tres puntos -->
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Actualizar</a></li>
                    <li><a class="dropdown-item" href="#">Eliminar</a></li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection
