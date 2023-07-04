@extends('layouts.layout_navbar')

@section('title','Imobiliária Eunice')

@section('content')

<link rel="stylesheet" href="{{ asset('css/pagina-principal.css') }}">
<script src="{{ asset('js/reload.js') }}"></script>

<section id="pesquisa-container">
        <div id="filtro">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="infoPesquisa" value="3">
                <button id="filtro-item" class="filtro-btn">Apartamento</button>
            </form>

            <form action="" method="post">
                @csrf
                <input type="hidden" name="infoPesquisa" value="2">
                <button id="filtro-item" class="filtro-btn">Terreno</button>
            </form>

            <form action="" method="post">
                @csrf
                <input type="hidden" name="infoPesquisa" value="1">
                <button id="filtro-item" class="filtro-btn">Casa</button>
            </form>

            <form action="" method="post">
                @csrf
                <input type="text" name="infoPesquisa" id="filtro-input" placeholder="pesquisa">
            </form>
        </div>
    </section>

    <h1 class="section-title">LISTA DE DESTAQUES</h1>
    <section id="destaques-container">

        <div id="destaques-content">
            @foreach($itens as $iten)

                <div id="destaques-item">
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

                    <button class="btn-detalhes">Detalhes</button>
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

<form action="/enviarEnviar" method="POST">
    @csrf

    <label>Nome</label>
    <input type="text" name="nome" id="nome" autocomplete="off">

    <label>Telefone</label>
    <input type="tel" autocomplete="off" id="telefone" name="telefone" placeholder="12 991574256" maxlength="12">


    <label>Email:</label>
    <input type="email" name="email" id="email" autocomplete="off">

    <label>Mensagem</label>
    <textarea name="descEmail" id="descEmail" cols="30" rows="10" autocomplete="off"></textarea>

    <button type="submit">Enviar</button>
</form> -->

@endsection
