<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/dropDown.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div id="navbar">
        <div id="nav-logo">
            <a href="/"><div class="imgHeader" style="background-image: url('{{ asset('img/logo.png') }}')"></div></a>

        </div>
        <div id="nav-buttons">

            @if(session('login'))
                <select name="opcao" class="nav-btn" id="dropdown">
                    <option disabled selected>{{ session('name') }}</option>
                    @foreach ($opcoes as $op)
                        <option value="{{ $op->id }}" id="{{ $op->id }}">{{ $op->name }}</option>
                    @endforeach
                </select>

                <form action="logout" method="POST">
                    @csrf
                    <button class="nav-btn" id="sair" type="submit" style="display: none"></button>
                </form>
            @else
                <a href="/login" id="btn-nav-entrar"><button class="nav-btn">Entrar <span class="material-symbols-outlined">login</span></button></a>
            @endif
        </div>
    </div>

    @yield('content')

    <div id="footer-container">
        <img src="{{asset('img/logo.png')}}" alt="">
        <div id="footer-contato-info">
            <p>(12) 9999-9999</p>
            <p>@imobiliaria-vendas</p>
        </div>
    </div>
</body>
</html>

<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>