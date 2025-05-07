<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <title>Mi primer Componente</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/navbar.css','resources/css/Auth.css'])
</head>

<body>
    @yield('Imagenfondo')
    <nav id="navbar"></nav> <!-- Solo uno así -->
    <main class="ContenidoMain">
        @yield('LayoustMain')
    </main>
    <footer class="FooterContenido">
        Footer
    </footer>
</body>

</html>
