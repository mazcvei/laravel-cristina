@extends('layouts.plantilla')

@section('content')
    <!-- Contenedor principal con fondo azul solo en el dashboard -->
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="background-color: #3D99FF; height: 100vh; font-family: 'Montserrat', sans-serif;">
        <!-- Título y enlaces, encima de la imagen -->
        <div class="text-center text-white" style="z-index: 1; position: relative;">
            <!-- Título -->
            <h2 class="font-semibold text-4xl mb-4" style="font-weight: 900;">MI ESPACIO</h2>

            <!-- Enlaces organizados horizontalmente sin subrayado -->
            <div class="mb-4">
                <a href="{{ route('tableros.index') }}" class="text-green-500 text-xl mx-4" style="color: #A4D77F; text-decoration: none; font-weight: 500;">ORGANIZA TU CONTENIDO</a>
                <a href="#" class="text-green-500 text-xl mx-4" style="color: #A4D77F; text-decoration: none; font-weight: 500;">CONECTA CON OTROS USUARIOS</a>
            </div>
        </div>

        <!-- Imagen colocada debajo del texto y ajustada para no tapar el contenido -->
        <div class="mb-4" style="width: 100%; max-width: 600px; ">
            <img src="{{ asset('storage/images/luna.png') }}" alt="Imagen Luna" class="img-fluid" style="max-width: 100%; height: auto; object-fit: contain;">
        </div>

        <!-- Cita debajo de la imagen -->
        <div class="text-center" style="z-index: 1; position: relative;">
            <p class="italic text-xl text-white">“La organización es la clave del éxito, no la habilidad”</p>
            <p class="text-lg text-white mt-2">- Steve Jobs</p>
        </div>
    </div>
@endsection
