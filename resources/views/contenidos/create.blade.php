@extends('layouts.plantilla')

@section('content')
    <div class="container" style="margin-top: 20px; min-height: calc(100vh - 100px); display: flex; flex-direction: column; justify-content: flex-start; padding-top: 100px;">
        <!-- Título centrado en el eje Y con margen del nav -->
        <div class="d-flex flex-column align-items-center">
            <h1 class="mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 30px; color: #3D99FF;">
                AÑADIR CONTENIDO
            </h1>

            <form action="{{ route('contenidos.store') }}" method="POST" enctype="multipart/form-data" class="w-50">
                @csrf <!-- Token de protección contra CSRF -->

                <!-- Campo para seleccionar el tablero -->
                <div class="mb-3">
                    <label for="tablero_id" class="form-label">
                        Selecciona un tablero: <span class="text-danger">*</span>
                    </label>
                    <select id="tablero_id" name="tablero_id" class="form-control shadow-sm" required>
                        <option value="">Elige un tablero</option> <!-- Opción predeterminada -->
                        @foreach($tableros as $tablero)
                            <option value="{{ $tablero->id }}">{{ $tablero->nombre_tablero }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo para el título del contenido -->
                <div class="mb-3">
                    <label for="titulo_contenido" class="form-label">
                        Inserta título contenido: <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="titulo_contenido" name="titulo_contenido" class="form-control shadow-sm" required>
                </div>

                <!-- Campo para la URL del contenido -->
                <div class="mb-3">
                    <label for="url" class="form-label">
                        Inserta url del contenido: <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="url" name="url" class="form-control shadow-sm" required>
                </div>

                <!-- Campo para la descripción (no obligatorio) -->
                <div class="mb-3">
                    <label for="descripcion_url" class="form-label">
                        Inserta descripción:
                    </label>
                    <textarea id="descripcion_url" name="descripcion_url" class="form-control shadow-sm" rows="5"></textarea>
                </div>

                <!-- Campo para la imagen (no obligatorio) -->
                <div class="mb-3">
                    <label for="imagen_url" class="form-label">
                        Adjuntar imagen:
                    </label>
                    <input type="file" id="imagen_url" name="imagen_url" class="form-control shadow-sm">
                </div>

                <!-- Botón para publicar, alineado a la derecha -->
                <button type="submit" class="btn" style="background-color: #3D99FF; color: white; font-size: 18px; padding: 10px 20px; float: right;">
                    Publicar
                </button>
            </form>
        </div>
    </div>
@endsection
