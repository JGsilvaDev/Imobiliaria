@extends('layouts.layout_navbar')

@section('title','Imobiliária Eunice')

@section('content')
<link rel="stylesheet" href="{{ asset('css/font-standards.css') }}">

<link rel="stylesheet" href="{{ asset('css/pagina-principal.css') }}">
<script src="{{ asset('js/reload.js') }}"></script>
<script src="{{ asset('js/caroselDestaque.js') }}"></script>
<script src="{{ asset('js/numformat.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,-25" />


<section id="pesquisa-container" class="background-blur">

        <div id="filtro">
            <form action="" method="post" class="filtro-btn">
                @csrf
                <input type="hidden" name="infoPesquisa" value="3">
                <button id="filtro-item" >Alugar</button>
            </form>

            <form action="" method="post" class="filtro-btn">
                @csrf
                <input type="hidden" name="infoPesquisa" value="1">
                <button id="filtro-item" >Comprar</button>
            </form>

            <form action="" method="post" class="filtro-btn">
                @csrf
                <input type="hidden" name="infoPesquisa" value="2">
                <button type="button" id="filtro-item" onclick="window.location.href = '/anuncio'">Anunciar</button>
            </form>

            <!-- <form action="" method="post" id="form-search">
                @csrf
                <input type="text" name="infoPesquisa" id="filtro-input" placeholder="Pesquisa">
            </form> -->
        </div>
</section>
    <input type="hidden" id="count" value="{{ $count }}">

<section id="destaques-container" class="carousel-container background-blur"> {{-- carousel-container --}}
    <h1 class="section-title">LISTA DE DESTAQUES</h1>
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
                    <span id="endereco-info-tipo-nome">{{ $iten->descricao }}</span>
                    <hr style="width:100%;" >
                    <p id="endereco-info-tipo-nome">{{ $iten->cod_imovel }}</p>
                    <p class="endereco-info-tipo">{{ $iten->titulo }}</p>
                    <p id="endereco-info-cidade"><span class="custom-icon"></span> <span class="endereco-localidade">{{ $iten->cidade}}</span></p>
                </div>
                <div id="item-dados">
                    <p id="dados-area">{{ $iten->area }}m²</p>
                    @if ($iten->vendidoAlugado == null)
                        <p id="dados-valor" class="num-format troca-ponto">R${{ $iten->valor}}</p>
                    @else
                        <p id="dados-valor" class="num-format troca-ponto">INDISPONÍVEL</p>
                    @endif
                </div>

                <form action="/imoveis/{{ $iten->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn-detalhes">Detalhes</button>
                </form>
            </div>
        @endforeach
    </div>

    <div id="ajuda-container" class="background-blur">
        <h1 class="section-title" style="text-align: center; font-size: 24px !important; margin-top: 50px">Como podemos ajudar?</h1>
        <section id="ajuda">
                <div id="ajuda-itens">
                    <div class="ajuda-item" onclick="window.location.href='/imoveis'" >
                        <img src="{{ asset('img/casa.svg') }}" alt="" class="ajuda-icon">
                        <p class="ajuda-info">Alugar um imóvel</p>
                    </div>
                    <div class="ajuda-item" onclick="window.location.href='/imoveis'">
                        <img src="{{ asset('img/dinheiro.svg') }}" alt="" class="ajuda-icon">
                        <p class="ajuda-info">Comprar um imóvel</p>
                    </div>
                    <div class="ajuda-item" onclick="window.location.href='/anuncio'">
                        <img src="{{ asset('img/megafone.svg') }}" alt="" class="ajuda-icon">
                        <p class="ajuda-info">Anunciar um imóvel</p>
                    </div>
                </div>
        </section>
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

 <script>
    const imoveis_desc_list = document.getElementsByClassName('endereco-localidade')
    const imoveis_title_list = document.getElementsByClassName('endereco-info-tipo')

    if (!widthLowerThan(600)) {
        lim = 10
    }
    else {
        lim = 8
    }


    function limitarStringPorPalavras(str, numeroPalavras) {
        const palavras = str.split(' ');
        const palavrasLimitadas = palavras.slice(0, numeroPalavras);
        return palavrasLimitadas.join(' ');
    }
    function widthLowerThan(largura) {
        if (window.screen.availWidth > largura) { return true }
        else return false
    }

    for(i=0; i<imoveis_desc_list.length; i++) {

        if(imoveis_desc_list[i].innerHTML.length > lim) {

            imoveis_desc_list[i].innerHTML = limitarStringPorPalavras(imoveis_desc_list[i].innerHTML , lim) + "...";
        }

    }

    for(i=0; i<imoveis_title_list.length; i++) {

        if(imoveis_title_list[i].innerHTML.length > lim) {

            imoveis_title_list[i].innerHTML = limitarStringPorPalavras(imoveis_title_list[i].innerHTML , lim) + "...";
        }

    }

</script>

<script>
    trocaPonto()
</script>

@endsection
