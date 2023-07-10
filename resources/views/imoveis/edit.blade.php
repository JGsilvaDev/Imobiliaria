@extends('layouts.layout_navbar')

@section('title','Detalhe Produto')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">
    <script src="{{ asset('js/mostrar-interesse.js') }}"></script>
    <script src="{{ asset('js/carocel.js') }}"></script>

    <button id="mostrar" onclick="changeVisibility()">Tenho interesse!</button>

    <div id="pagina-layout">

        <section id="interesse" class="margin-spaced padding-spaced">
            <div id="fechar-icone-container" onclick="changeVisibility()">
                <img src="./fechar-icone.svg" alt="" id="fechar-icone">
            </div>
            <div id="interesse-contato-container" class="flex-center-center-column">
                <h1>Se interessou pelo imóvel? fale conosco!</h1>
                <input type="text" id="interesse-contato-nome" class="interesse-contato-input" placeholder="Nome">
                <input type="text" id="interesse-contato-telefone" class="interesse-contato-input" placeholder="Telefone">
                <input type="text" id="interesse-contato-email" class="interesse-contato-input" placeholder="Email">
                <textarea name="" id="interesse-contato-texto" cols="30" rows="10" class="interesse-contato-input" placeholder="Texto (opcional)" res></textarea>
                <button id="interesse-btn">Enviar</button>
            </div>
        </section>

        <div id="produto-layout">
            <section id="imovel-info-main" class="flex-center-center-column margin-spaced padding-spaced">
                <div id="imovel-titulo">
                    <h1>{{ $detalhes->titulo }} {{ $detalhes->id}}</h1>
                    <div id="produto-carrossel" class="flex-center-center">
                        <button id="voltar-imagem">Voltar Imagem</button>
                        @foreach ($imagens as $index => $path)
                            @if($detalhes->id == $path->chave)
                                <img id="imagem-{{ $index }}" src="{{asset($path->path)}}" alt="Imagem">
                            @endif
                        @endforeach
                        <button id="mudar-imagem">Mudar Imagem</button>
                    </div>
                    <h2 id="valor">R${{ $detalhes->valor }}</h2>
                    <div id="imovel-dados" class="flex-row">
                        <p id="local">{{ $detalhes->localidade }}</p>
                        <p id="quartos">{{ $detalhes->qtdQuartos }} de quartos, {{ $detalhes->qtdBanheiros }} banheiros</p>
                        <p id="area">{{ $detalhes->area }} m<sup>2</sup></p>
                    </div>
                </div>
            </section>

            <section id="descricao" >
                <div id="descricao-container" class="margin-spaced padding-spaced">
                    <h2 class="detalhes-titulo">Descrição do produto</h2>
                    <p id="desc-texto">{{ $detalhes->descricao }}</p>
                </div>
            </section>

            <section id="mais-detalhes" class="margin-spaced padding-spaced">
                <h2 class="detalhes-titulo">Mais detalhes</h2>
                <div id="mais-detalhes-container">
                    <h3 class="mais-detalhes-subtitulo">Básico</h3>
                    <div class="detalhes-itens">
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                    </div>
                    <h3 class="mais-detalhes-subtitulo">Serviço</h3>
                    <div class="detalhes-itens">
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                    </div>
                    <h3 class="mais-detalhes-subtitulo">Lazer</h3>
                    <div class="detalhes-itens">
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                        <p class="detalhes-item">Água</p>
                    </div>
                </div>
            </section>

            <section id="semelhantes" class="margin-spaced padding-spaced">
                <div id="semelhante-container">
                    <h1 class="detalhes-titulo">Conheça semelhantes</h1>
                @if($semelhante)
                    @foreach( $semelhante as $sem )
                        <div id="semelhante-produtos-itens">
                            <div class="semelhante-produto-card">
                                @foreach ($imagens as $path)
                                    @if($sem->id == $path->chave)
                                        <img src="{{asset($path->path)}}" alt="Imagem">
                                    @endif
                                @endforeach
                                <p class="semelhante-produto-titulo">{{ $sem->titulo }}</p>
                                <p class="semelhante-produto-localidade">Localidade - {{ $sem->localidade }}</p>
                                <div id="semelhante-produto-info" class="flex-row">
                                    <p class="semelhante-produto-area">{{ $sem->area }}</p>
                                    <p class="semelhante-produto-vagas">{{ $sem->qtdVagas }}</p>
                                </div>
                                <form action="/imoveis/{{ $sem->id }}" method="post">
                                    @csrf
                                    <input type="hidden" name="idImovel">
                                    <button class="produto-saber-mais" type="submit">Detalhe</button>
                                </form>

                            </div>
                    @endforeach
                @endif
            </section>
        </div>
    </div>

@endsection
