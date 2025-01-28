@extends('layouts.plantilla')

@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="d-flex flex-column align-items-center">
            <h1 class="mb-4" style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 30px; color: #3D99FF;">
                AÑADIR SUBCONTENIDO
            </h1>

            <form action="{{ route('contenidos.storeSubcontent', $contenido->id) }}" method="POST" enctype="multipart/form-data" class="w-50">
                @csrf

                <!-- Mostrar el tablero como texto fijo -->
                <div class="mb-3">
                    <label for="tablero" class="form-label">
                        Tablero: <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="tablero" value="{{ $tablero->nombre_tablero }}" class="form-control shadow-sm" readonly>
                </div>

                <!-- Mostrar el contenido base como texto fijo -->
                <div class="mb-3">
                    <label for="contenido_base" class="form-label">
                        Contenido base: <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="contenido_base" value="{{ $contenido->titulo_contenido }}" class="form-control shadow-sm" readonly>
                </div>

                <!-- Campo para la URL del subcontenido -->
                <div class="mb-3">
                    <label for="url" class="form-label">
                        URL del subcontenido: <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="url" name="url" class="form-control shadow-sm" required>
                </div>

                <!-- Campo para la descripción (opcional) -->
                <div class="mb-3">
                    <label for="descripcion_url" class="form-label">
                        Descripción del subcontenido:
                    </label>
                    <textarea id="descripcion_url" name="descripcion_url" class="form-control shadow-sm" rows="5"></textarea>
                </div>

                <!-- Campo para la imagen (opcional) -->
                <div class="mb-3">
                    <label for="imagen_url" class="form-label">
                        Adjuntar imagen:
                    </label>
                    <input type="file" id="imagen_url" name="imagen_url" class="form-control shadow-sm">
                </div>

                <!-- Botón para publicar -->
                <button type="submit" class="btn btn-primary" style="float: right;">
                    Publicar
                </button>
            </form>
        </div>
    </div>
@endsection
