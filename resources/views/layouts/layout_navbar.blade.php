<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/dropDown.js') }}"></script>
    <script src="{{ asset('js/reload.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div id="navbar" class="background-blur enable-dark">
        <div id="nav-logo">
            <a href="/"><div class="imgHeader" style="background-image: url('{{ asset('img/logo.png') }}')"></div></a>

        </div>
        <div id="nav-buttons">
            <a href="/imoveis"><button class="nav-btn">Imóveis</button></a>
            <a href="/sobre"><button class="nav-btn">Sobre nós</button></a>
            <button class="nav-btn" onclick="modal();">Contato</button>

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

    <div id="footer-container" class="paragrafos">
        <hr class="style_hr">

        <div class="style_paragrafo">
            <div>
                <p>Institutional</p>
                <p>page page page 1</p>
                <p>page page 1</p>
                <p>page</p>
            </div>
            <div>
                <p>Institutional</p>
                <p>page page page 1</p>
                <p>page page 1</p>
                <p>page</p>
            </div>
            <div>
                <p>Institutional</p>
                <p>page page page 1</p>
                <p>page page 1</p>
                <p>page</p>
            </div>
            <div>
                <p>Fale conosco</p>
                <p>Localização</p>
                <p>Número do whats</p>
                <p>Robson</p>
                <p>Clobeson</p>
            </div>
            <div>
                <img src="{{asset('img/logo.png')}}">
            </div>
        </div>

        <hr class="style_hr">
        
        <div class="separacao_filhos">
            <div>
                <p id="color_squad">©2023 Desenvolvido por pineapple squad</p>
            </div>
            <div class="separacao_icones">
                <img src="{{asset('img/facebook.svg')}}" alt="">
                <img src="{{asset('img/instagram.svg')}}" alt="">
                <img src="{{asset('img/whatsapp.svg')}}" alt="">
            </div>
        </div>
    </div>


<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>
