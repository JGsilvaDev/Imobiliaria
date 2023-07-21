@extends('layouts.layout_navbar')

@section('title','Detalhe Produto')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">

    <script src="{{ asset('js/mostrar-interesse.js') }}"></script>
    <script src="{{ asset('js/caroselDetalhe.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

    <button id="mostrar" onclick="changeVisibility()">Tenho interesse!</button>

    <div id="pagina-layout">

        <section id="interesse" class="margin-spaced padding-spaced">
            <div id="fechar-icone-container" onclick="changeVisibility()">
                <img src="{{ asset('img/fechar-icone.svg') }}" alt="" id="fechar-icone">
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
        <!-- <div class="produto-info-box">

            </div> -->
            <div id="produto-layout">
                <section id="imovel-info-main" class="flex-center-center-column margin-spaced padding-spaced">
                    <h1>{{ $detalhes->titulo }} {{ $detalhes->id}}</h1>
                    <div id="produto-carrossel" class="flex-center-center slider-for">
                        {{-- <button id="voltar-imagem" class="img-navigation">&lt</button> --}}
                        @foreach ($imagens as $index => $path)
                            @if($detalhes->id == $path->chave)
                                <div><div class="carrossel-img-frame img" style="background-image: url('{{asset($path->path)}}')"></div></div>
                            @endif
                        @endforeach
                        {{-- <button id="mudar-imagem" class="img-navigation">&gt</button> --}}
                    </div>

                    <div id="produto-carrossel-nav" class="flex-center-center slider-nav">
                        {{-- <button id="voltar-imagem" class="img-navigation">&lt</button> --}}
                        @foreach ($imagens as $index => $path)
                            @if($detalhes->id == $path->chave)
                                <div><div class="carrossel-img-frame img-nav" style="background-image: url('{{asset($path->path)}}')"></div></div>
                            @endif
                        @endforeach
                        {{-- <button id="mudar-imagem" class="img-navigation">&gt</button> --}}
                    </div>

                    <div id="imovel-dados" class="flex-row">
                        <h2 id="valor">R${{ $detalhes->valor }}</h2>
                        <p id="local">{{ $detalhes->localidade }}</p>
                        <p id="area">{{ $detalhes->area }} m<sup>2</sup></p>
                        <p id="quartos">{{ $detalhes->qtdQuartos }} de quartos, {{ $detalhes->qtdBanheiros }} banheiros</p>
                    </div>
                </section>

                <section id="descricao" >
                    <div id="descricao-container" class="margin-spaced padding-spaced">
                        <h2 class="detalhes-titulo">Tipo de contrato</h2>
                        <p id="desc-texto">{{ $detalhes->tp_contrato }}</p>
                    </div>
                    <div id="descricao-container" class="margin-spaced padding-spaced">
                        <h2 class="detalhes-titulo">Descrição do produto</h2>
                        <p id="desc-texto">{{ $detalhes->desc }}</p>
                    </div>
                </section>

                @if ($detalhes->tp_contrato != 'Terreno')
                    <section id="mais-detalhes" class="margin-spaced padding-spaced">
                        <h2 class="detalhes-titulo">Mais detalhes</h2>
                        <div id="mais-detalhes-container">
                            <ul>
                                {{-- <li>{{ $detalhes->qtdBanheiros }} banheiros</li>
                                <li>{{ $detalhes->qtdQuartos }} quartos</li>
                                <li>{{ $detalhes->qtdVagas }} vagas</li> --}}
                            </ul>
                        </div>
                    </section>
                @endif

                <section id="semelhantes" class="margin-spaced padding-spaced">
                    <div id="semelhante-container">
                        <h1 class="detalhes-titulo">Conheça semelhantes</h1>
                    @if($semelhante)
                        @foreach( $semelhante as $sem )
                            <div id="semelhante-produtos-itens">
                                <div class="semelhante-produto-card">
                                    @foreach ($imagemPrincipal as $path)
                                        @if($sem->id == $path->chave)
                                            <div class="img" style="background-image: url('{{ asset($path->path) }}')"></div>
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
