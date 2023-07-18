@extends('layouts.layout_navbar')

@section('title','Imobiliária Eunice')

@section('content')

<link rel="stylesheet" href="{{ asset('css/pagina-principal.css') }}">
<script src="{{ asset('js/reload.js') }}"></script>
<script src="{{ asset('js/caroselDestaque.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

<section id="pesquisa-container">
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

            <form action="" method="post">
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
                            <div class="img" style="background-image: url('{{asset($path->path)}}')"></div>
                            @break
                        @endif
                    @endforeach

                    <div id="destaque-endereco-info">
                        <p id="endereco-info-tipo">{{ $iten->titulo }}</p>
                        <p id="endereco-info-tipo">{{ $iten->descricao }}</p>
                        {{-- <p id="endereco-info-local">Centro</p> --}}
                        <p id="endedreco-info-cidade">{{ $iten->localidade}}</p>
                    </div>
                    <div id="item-dados">
                        <p id="dados-area">{{ $iten->area }}</p>
                        <p id="dados-vagas">{{ $iten->valor}}</p>
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
