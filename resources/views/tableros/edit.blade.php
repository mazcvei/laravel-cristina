@extends('layouts.plantilla')

@section('content')
<div class="container" style="margin-top: 20px; min-height: calc(100vh - 100px); display: flex; flex-direction: column; justify-content: flex-start; padding-top: 100px;">
    <!-- Título centrado -->
    <div class="d-flex flex-column align-items-center">
        <h1 class="mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 30px; color: #3D99FF;">
            EDITAR TABLERO
        </h1>

        <!-- Formulario de edición -->
        <form action="{{ route('tableros.update', $tablero->id) }}" method="POST" class="w-50">
            @csrf
            @method('PUT') <!-- Indica que es una actualización -->

            <!-- Campo para el nombre del tablero -->
            <div class="mb-3">
                <label for="nombre_tablero" class="form-label">
                    Nombre Tablero: <span class="text-danger">*</span>
                </label>
                <input type="text" id="nombre_tablero" name="nombre_tablero" class="form-control shadow-sm" 
                       value="{{ old('nombre_tablero', $tablero->nombre_tablero) }}" required>
            </div>

            <!-- Botón para guardar cambios -->
            <button type="submit" class="btn" style="background-color: #3D99FF; color: white; font-size: 18px; padding: 10px 20px; float: right;">
                Guardar Cambios
            </button>
        </form>
    </div>
</div>
@endsection
