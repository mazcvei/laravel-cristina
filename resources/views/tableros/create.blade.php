@extends('layouts.plantilla')

@section('content')
    <div class="container" style="margin-top: 20px; min-height: calc(100vh - 100px); display: flex; flex-direction: column; justify-content: flex-start; padding-top: 100px;">
        <!-- Título centrado en el eje Y con margin del nav -->
        <div class="d-flex flex-column align-items-center">
            <h1 class="mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 30px; color: #3D99FF;">
                CREAR TABLERO
            </h1>

            <form action="{{ route('tableros.store') }}" method="POST" class="w-50">
                @csrf

                <!-- Campo para el nombre del tablero -->
                <div class="mb-3">
                    <label for="nombre_tablero" class="form-label">
                        Nombre Tablero: <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="nombre_tablero" name="nombre_tablero" class="form-control shadow-sm" required>
                </div>

                <!-- Botón para publicar, alineado a la derecha -->
                <button type="submit" class="btn" style="background-color: #3D99FF; color: white; font-size: 18px; padding: 10px 20px; float: right;">
                    Publicar
                </button>
            </form>
        </div>
    </div>
@endsection
