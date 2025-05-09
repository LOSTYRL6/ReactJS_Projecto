<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <title>Mi primer Componente</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/navbar.css', 'resources/css/Auth.css', 'resources/js/main.js', 'resources/js/Auth.js'])
</head>

<body>
    @yield('Imagenfondo')
    <nav class="NavbarSouls">
        <div class="Logo">
            <img src="{{ asset('imagen/logo/SoulsHUBPNG.png') }}" alt="Logo" class="LogoImage">
            @if (Auth::check())
                <div class="ContenedorIconoUsuario">
                    <img src="{{ asset(Auth::user()->imagen_icono) }}" alt="Icono Usuario" class="TuIcono">
                    <h1>Welcome Back <span class="ColorName"> {{ Auth::user()->nombre }}</span> </h1>
                    <div class="OpciondeUsuario">
                        <div class="Salir">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-logout">Salir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <button onclick="window.location.href='{{ url('/Registrar') }}'">Registrarse</button>
                <button onclick="window.location.href='{{ url('/Iniciar') }}'">Iniciar Sesión</button>
            @endif
        </div>

        <div class="Menu d-none d-md-flex">
            <h1>Home</h1>
            <h1>Sobre Nosotros</h1>
            <h1>Juegos</h1>
        </div>

        <div class="BurgerMenu d-md-none" onclick="toggleMenu()">
            <span class="burger-icon"></span>
        </div>
    </nav>

    <div class="MobileMenu" id="mobileMenu">
        <h1>Home</h1>
        <h1>Sobre Nosotros</h1>
    </div>

    <nav class="NavbarFixed" id="navbarFixed">
        <img src="{{ asset('imagen/logo/SoulsHUBPNG.png') }}" alt="Logo" class="d-md-none">

        <div class="MenuFixed d-flex justify-content-between align-items-center w-100">
            <div class="categoriaMenu">
                <h1>Home</h1>
                <h1>Sobre Nosotros</h1>
            </div>

            <div class="BurgerMenu d-md-none" onclick="toggleFixedMenu()">
                <span class="burger-icon"></span>
            </div>
        </div>
    </nav>


    <div class="MobileMenuFixed" id="fixedMenu">
        <button class="CloseButton" onclick="closeFixedMenu()">Volver</button>
        <h1>Home</h1>
        <h1>Sobre Nosotros</h1>
    </div>

    <main class="ContenidoMain">
        @yield('LayoustMain')
    </main>
    <footer class="FooterContenido">
        Footer
    </footer>
</body>

</html>
