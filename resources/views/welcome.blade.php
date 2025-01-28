<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html, body {
    margin: 0;
    padding: 0;
    height: 100%;
}
        .hero {
            background-image: url('{{ asset("storage/images/cabecera.jpg") }}'); 
            background-size: cover; /* Escala la imagen para cubrir */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita repeticiones */
            height: 100vh; /* Toda la altura del navegador */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centra el contenido verticalmente */
            align-items: center; /* Centra el contenido horizontalmente */
            color: white;
            font-family: 'Montserrat', sans-serif; /* Fuente Montserrat */
            text-align: center;
            position: relative; /* Necesario para posicionar los puntos */
        }

        .navbar {
            background: transparent !important; /* Fondo transparente */
            font-family: 'Montserrat', sans-serif; /* Fuente Montserrat */
            position: fixed; /* Posiciona el navbar arriba del todo */
            top: 0;
            width: 100%; /* Ocupa todo el ancho */
        }

        .navbar-brand {
            color: #3D99FF !important; /* Aplica el color azul al logo */
            font-weight: bold; /* Opcional: para darle más presencia */
            font-size: 1.5rem; /* Ajusta el tamaño según prefieras */
            text-decoration: none; /* Elimina subrayado si lo hubiera */
            font-family: 'Montserrat', sans-serif !important; 
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: white !important; /* Cambia el color a blanco */
            font-size: 1rem; /* Ajusta el tamaño si es necesario */
            text-transform: uppercase; /* Opcional: transforma el texto a mayúsculas */
        }

        .hero-content {
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px; /* Espacio debajo del título */
        }

        .dots {
            display: flex;
            justify-content: center;
            gap: 10px; /* Espacio entre los puntos */
            margin: 20px 0; /* Margen superior e inferior */
        }

        .dots div {
            background-color: #A4D77F !important; ;
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%; /* Forma circular */
        }

        p {
            font-size: 1.2rem;
            margin-top: 10px; /* Espaciado superior */
        }

        span {
            font-size: 1rem;
            font-style: italic;
            display: block;
            margin-top: 10px;
        }

        .imagen-redondeada {
            width: 300px;
            height: 200px;
            border-radius: 15px;
            margin-top: 40px; /* Márgenes iguales en todos los lados */
            margin-bottom: 40px;
            display: block; /* Hace que la imagen sea un bloque */
            margin-left: auto; /* Centra la imagen horizontalmente */
            margin-right: auto; /* Centra la imagen horizontalmente */
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }


        .card-body .btn {
            align-self: center;
        }

    
        .row {
            display: flex;
            justify-content: center; /* Centra los divs y los pone más juntos */
            gap: 20px; /* Ajusta el espacio entre los divs */
            width: 100%;
        }

        





    </style>

</head>
<body>
    <!-- HERO SECTION -->
    <div class="hero">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#">MYCLOUDBOX</a>

                <!-- Menú de inicio sesión y registro -->
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">INICIAR SESIÓN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">REGISTRARSE</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="hero-content">
            <h1>ORGANIZA. ENCUENTRA. CRECE.</h1>
            <div class="dots">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p>“El secreto de la creatividad es saber cómo esconder tus fuentes”</p>
            <span>Albert Einstein</span>
        </div>
    </div>




    <div class="container mt-5" style="background-color: #F5F5F5;">
        <!-- Frase principal -->
        <div class="text-center">
            <h2>Eficiencia y comunidad en un solo espacio.</h2>
        </div>

        <!-- Descripción -->
        <div class="text-center mb-5">
            <p>Administre sin esfuerzo sus recursos educativos con nuestra interfaz intuitiva. Cree categorías y mantenga sus enlaces organizados para un acceso fácil. Además, puedes crear o unirte a grupos de discusión para compartir ideas, interactuar con otros usuarios y enriquecer su experiencia de aprendizaje.</p>
        </div>

        <div class="container cajas">
            <!-- Div azul con imagen -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="card" style="background-color: #3D99FF; border-radius: 15px;">
                        <img src="{{ asset('storage/images/biblioteca.png') }}" class="card-img-top imagen-redondeada" alt="Imagen de gestión de categorías">
                        <div class="card-body d-flex flex-column" style="color: white;">
                            <h5 class="card-title">Gestión de categorías</h5>
                            <p class="card-text">Categorice y ordene de manera eficiente sus enlaces para un acceso rápido y una mejor organización.</p>
                            <!-- Botón dentro del card -->
                            <a href="{{ route('register') }}" class="btn" style="background-color: #A4D77F; color: white;">Pruébalo ahora</a>
                        </div>
                    </div>
                </div>

                <!-- Segundo div azul -->
                <div class="col-md-4">
                    <div class="card" style="background-color: #3D99FF; border-radius: 15px;">
                        <img src="{{ asset('storage/images/nubes.jpg') }}" class="card-img-top imagen-redondeada" alt="Imagen de gestión de categorías">
                        <div class="card-body d-flex flex-column" style="color: white;">
                            <h5 class="card-title">Conecta y comparte ideas</h5>
                            <p class="card-text">Crea grupos de discusión sobre los temas que más te interesen. Conecta con personas que compartan tus pasiones, intercambia ideas y aprende de otros.</p>
                            <!-- Botón dentro del card -->
                            <a href="{{ route('register') }}" class="btn" style="background-color: #A4D77F; color: white;">Pruébalo ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Sección con la frase centrada -->
    <div class="text-center mb-5" style="margin-top: 100px;">
        <h2 style="font-weight: bold; font-size: 40px;">DESCUBRE CÓMO EMPEZAR</h2>
    </div>

    <!-- Sección con los números y rectángulos -->
    <div class="row justify-content-center mb-5" style="margin-top: 100px; margin-bottom:100px;">
        <div class="col-md-2 text-center">
            <h3 style="font-weight: bold; font-size: 80px; color: #3D99FF;">01</h3>
            <div class="rectangulo" style="background: linear-gradient(to right, #A4D77F 25%, #3D99FF 25%); height: 20px;"></div>
            <p class="mt-3" style="color: #3D99FF;">REGÍSTRATE</p>
            <p>Crea tu cuenta o accede para empezar a organizar tu contenido.</p>
        </div>
        <div class="col-md-2 text-center">
            <h3 style="font-weight: bold; font-size: 80px; color: #3D99FF;">02</h3>
            <div class="rectangulo" style="background: linear-gradient(to right, #3D99FF 25%, #A4D77F 25%, #A4D77F 50%, #3D99FF 50%, #3D99FF 75%, #3D99FF 75%); height: 20px;"></div>

            <p class="mt-3" style="color: #3D99FF;">CREA</p>
            <p>Organiza tus recursos creando carpetas temáticas según tus necesidades y agrega el contenido necesario a las mismas.</p>
        </div>
        <div class="col-md-2 text-center">
            <h3 style="font-weight: bold; font-size: 80px; color: #3D99FF;">03</h3>
            <div class="rectangulo" style="background: linear-gradient(to right, #3D99FF 25%, #3D99FF 25%, #3D99FF 50%, #A4D77F 50%, #A4D77F 75%, #3D99FF 75%); height: 20px;"></div>

            <p class="mt-3" style="color: #3D99FF;">ADMINISTRA</p>
            <p>Accede fácilmente a tus recursos y actualiza la información cuando lo necesites.</p>
        </div>
        <div class="col-md-2 text-center">
            <h3 style="font-weight: bold; font-size: 80px; color: #3D99FF;">04</h3>
            <div class="rectangulo" style="background: linear-gradient(to right, #3D99FF 75%, #A4D77F 25%); height: 20px;"></div>
            <p class="mt-3" style="color: #3D99FF;">COMPARTE</p>
            <p>Crea o únete a grupos temáticos para compartir ideas y aprender de otros usuarios. </p>
        </div>
    </div>


    


        

















    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
