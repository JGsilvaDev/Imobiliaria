@extends('layouts.layout_navbar')

@section('title','Imobiliária Eunice')

@section('content')

<link rel="stylesheet" href="{{ asset('css/pagina-principal.css') }}">
<script src="{{ asset('js/reload.js') }}"></script>
<script src="{{ asset('js/caroselDestaque.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,-25" />

<section id="pesquisa-container">
    <div id="modalContato" class="contato-container" style="display:block">
        <div id="contato-titulo">
            <h1 class="contato-title">Fale conosco!</h1>
            <button onclick="modal();">X</button>
        </div>

        <form action="/contato" method="POST" id="contato-content" autocomplete="off" >
            @csrf
            <input type="text" name="nome" id="" class="contato-input" placeholder="nome">
            <input type="text" name="telefone" id="" class="contato-input" placeholder="telefone">
            <input type="email" name="email" id="" class="contato-input" placeholder="email">
            <textarea name="mensagem" id="" cols="30" rows="10" class="contato-input" style="resize:none" placeholder="mensagem"></textarea>
            <button type="submit" class="contato-enviar">Enviar</button>

            <div id="divisor">
                <hr>
                <p>ou</p>
                <hr>
            </div>

            <button class="contato-enviar-whatsapp">Fale por Whatsapp</button>
        </form>
    </div>

        <div id="filtro">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="infoPesquisa" value="3">
                <button id="filtro-item" class="filtro-btn">Apartamento</button>
            </form>

            <form action="" method="post">
                @csrf
                <input type="hidden" name="infoPesquisa" value="1">
                <button id="filtro-item" class="filtro-btn">Terreno</button>
            </form>

            <form action="" method="post">
                @csrf
                <input type="hidden" name="infoPesquisa" value="2">
                <button id="filtro-item" class="filtro-btn">Casa</button>
            </form>

            <form action="" method="post" id="form-search">
                @csrf
                <input type="text" name="infoPesquisa" id="filtro-input" placeholder="pesquisa">
            </form>
        </div>
    </section>

    <input type="hidden" id="count" value="{{ $count }}">

    <h1 class="section-title">LISTA DE DESTAQUES</h1>
    <section id="destaques-container" class="carousel-container"> {{-- carousel-container --}}
        <div id="destaques-content"> {{-- carousel --}}
            @foreach($itens as $iten)

                <div id="destaques-item" class="carousel-item">
                    @foreach ($imagens as $path)
                        @if($iten->id == $path->chave)
                            <div class="carrossel-img" style="background-image: url('{{asset($path->path)}}')"></div>
                            @break
                        @endif
                    @endforeach

                    <div id="destaque-endereco-info">
                        <p id="endereco-info-tipo">{{ $iten->titulo }}</p>
                        <!-- <p id="endereco-info-tipo">{{ $iten->descricao }}</p> -->
                        {{-- <p id="endereco-info-local">Centro</p> --}}
                        <p id="endedreco-info-cidade"><span class="material-symbols-outlined">location_on</span> {{ $iten->localidade}}</p>
                    </div>
                    <div id="item-dados">
                        <p id="dados-area">{{ $iten->area }}m²</p>
                        <p id="dados-vagas">R${{ $iten->valor}}</p>
                        {{-- <p id="dados-banheiros">2</p> --}}
                    </div>

                    <form action="/imoveis/{{ $iten->id }}" method="post">
                        @csrf
                        <button type="submit" class="btn-detalhes">Detalhes</button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>


    <section id="ajuda">
        <h1 class="section-title">Como podemos ajudar?</h1>

        <div id="ajuda-itens">
            <div id="ajuda-item">
                <img src="img/casa.svg" alt="" class="ajuda-icon">
                <p id="ajuda-info">alugar um imóvel</p>
            </div>
            <div id="ajuda-item">
                <img src="img/dinheiro.svg" alt="" class="ajuda-icon">
                <p id="ajuda-info">Comprar um imóvel</p>
            </div>
            <div id="ajuda-item">
                <img src="img/megafone.svg" alt="" class="ajuda-icon">
                <p id="ajuda-info">anunciar um imóvel</p>
            </div>
        </div>
    </section>

<!--
@if(session('email'))
    <div class="alert alert-success flash-message">
        {{ session('email') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 -->

@endsection
