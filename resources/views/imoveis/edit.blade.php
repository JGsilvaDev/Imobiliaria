<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&display=swap" rel="stylesheet">
    <title>Detalhe Produto</title>
</head>
<body>
    <script src="{{ asset('js/mostrar-interesse.js') }}"></script>

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
                        @foreach ($imagens as $path)
                            @if($detalhes->id == $path->chave)
                                <img src="{{asset($path->path)}}" alt="Imagem">
                            @endif
                        @endforeach
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
                    <div id="semelhante-produtos-itens">
                        <div class="semelhante-produto-card">
                            <img src="./template.png" alt="" class="semelhante-produto-img">
                            <p class="semelhante-produto-titulo">Título do produto semelhante</p>
                            <p class="semelhante-produto-localidade">Localidade - Pindamonhangaba</p>
                            <div id="semelhante-produto-info" class="flex-row">
                                <p class="semelhante-produto-area">250m2</p>
                                <p class="semelhante-produto-vagas">35 mil vagas</p>
                            </div>
                            <p class="semelhante-produto-descricao">Descrição do produto</p>

                        </div>
                        <div class="semelhante-produto-card">
                            <img src="./template.png" alt="" class="semelhante-produto-img">
                            <p class="semelhante-produto-titulo">Título do produto semelhante</p>
                            <p class="semelhante-produto-localidade">Localidade - Pindamonhangaba</p>
                            <div id="semelhante-produto-info" class="flex-row">
                                <p class="semelhante-produto-area">250m2</p>
                                <p class="semelhante-produto-vagas">35 mil vagas</p>
                            </div>
                            <p class="semelhante-produto-descricao">Descrição do produto</p>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

</body>
</html>
