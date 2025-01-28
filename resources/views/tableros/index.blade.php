@extends('layouts.plantilla')

@section('content')
<div class="container">
    <!-- Título -->
    <h4 class="text-center" style="margin-top: 100px; margin-bottom:50px; font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 30px; color: #3D99FF;">ARCHIVOS DE {{ strtoupper(Auth::user()->name) }}</h4>

    <!-- Botones para añadir Tablero y Contenido -->
    <div class="d-flex justify-content-center" style="margin-bottom: 50px;">
        <div class="añadirTablero" style="margin-right: 15px;">
            <a href="{{ route('tableros.create') }}" style="text-decoration: none; color: white; background-color: #4CAF50; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center;">
                <i class="fas fa-folder-open" style="margin-right: 10px;"></i> Añadir Tablero
            </a>
        </div>
        <div class="añadirContenido">
            <a href="{{ route('contenidos.create') }}" style="text-decoration: none; color: white; background-color: #4CAF50; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center;">
                <i class="fas fa-folder-open" style="margin-right: 10px;"></i> Añadir Contenido
            </a>
        </div>
    </div>

    <!-- Lista de Tableros -->
    <div class="row">
        @foreach($tableros as $tablero)
            <div class="col-md-3" style="margin-bottom: 20px;">
                <div class="tablero" style="background-color: #3D99FF; padding: 15px; border-radius: 8px; color: white; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <!-- Nombre del tablero con link a la página 'show' -->
                    <div class="d-flex justify-content-between align-items-center">
                        
                        <h3><a href="{{ route('tableros.show', $tablero->id) }}" style="color: white; text-decoration: none; font-size: 20px; text-transform: uppercase;">{{ $tablero->nombre_tablero }}</a></h3>

                        <!-- Menú desplegable (icono de tres puntos) -->
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background: none; border: none; color: white;">
                                &#8230;
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('contenidos.create') }}">Añadir contenido</a></li>
                                <li><a class="dropdown-item" href="{{ route('tableros.edit', $tablero->id) }}">Editar</a></li>
                                <li>
                                    <form action="{{ route('tableros.destroy', $tablero->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Eliminar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
