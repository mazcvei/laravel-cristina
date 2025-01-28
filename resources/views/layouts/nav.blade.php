<nav class="navbar navbar-expand-lg" style="background-color: #3D99FF;">
    <div class="container">
        <!-- Logo en el lado izquierdo -->
        <a class="navbar-brand" href="{{  url('/')  }}" 
            style="font-family: 'Montserrat', sans-serif; font-weight: 900; font-size: 30px; color: white;">
            MYCLOUDBOX
        </a>

        <!-- Menú en el lado derecho -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Menú para invitados -->
                @guest
                    <li class="nav-item" style="margin-right: 15px;">
                        <a class="nav-link" href="{{ route('login') }}" 
                            style="font-family: 'Montserrat', sans-serif; font-weight: 300; font-size: 14px; color: white;">
                            INICIAR SESIÓN
                        </a>
                    </li>
                    <li class="nav-item" style="margin-right: 15px;">
                        <a class="nav-link" href="{{ route('register') }}" 
                            style="font-family: 'Montserrat', sans-serif; font-weight: 300; font-size: 14px; color: white;">
                            REGISTRARSE
                        </a>
                    </li>
                @endguest

                <!-- Menú para usuarios autenticados -->
                @auth
                    <li class="nav-item" style="margin-right: 15px;">
                        <a class="nav-link" href="{{ route('dashboard') }}" 
                            style="font-family: 'Montserrat', sans-serif; font-weight: 300; font-size: 14px; color: white;">
                            INICIO
                        </a>
                    </li>
                    <li class="nav-item" style="margin-right: 15px;">
                        <a class="nav-link" href="{{ route('tableros.index') }}" 
                            style="font-family: 'Montserrat', sans-serif; font-weight: 300; font-size: 14px; color: white;">
                            MIS CONTENIDOS
                        </a>
                    </li>
                    <li class="nav-item" style="margin-right: 15px;">
                        <a class="nav-link" href="{{ route('social.index') }}" 
                            style="font-family: 'Montserrat', sans-serif; font-weight: 300; font-size: 14px; color: white;">
                            SOCIAL
                        </a>
                    </li>
                    <!-- Dropdown del usuario -->
                    <li class="nav-item dropdown" style="margin-right: 15px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                            data-bs-toggle="dropdown" aria-expanded="false" 
                            style="font-family: 'Montserrat', sans-serif; font-weight: 300; font-size: 14px; color: white;">
                            {{ strtoupper(Auth::user()->name) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}" 
                                    style="font-family: 'Montserrat', sans-serif; font-weight: 300; font-size: 14px;">
                                    MI PERFIL
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item" 
                                        style="font-family: 'Montserrat', sans-serif; font-weight: 300; font-size: 14px; background: none; border: none; cursor: pointer;">
                                        CERRAR SESIÓN
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
