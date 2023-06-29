<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <div id="navbar">
        <div id="nav-logo">
            <p>LOGO</p>
        </div>
        <div id="nav-buttons">
            <a href="/imoveis"><button class="nav-btn">Imóveis</button></a>
            <a href="/sobre"><button class="nav-btn">Sobre nós</button></a>
            <a href=""><button class="nav-btn">Contato</button></a>
            <a href="/login"><button class="nav-btn">Entrar</button></a>
        </div>
    </div>

    @yield('content')
</body>
</html>
