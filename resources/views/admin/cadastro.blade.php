<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/cadastro-imovel.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <title>Cadastrar produto</title>
</head>
<body>
    <div id="abas">
        <button id="btn-aba-casa" onclick="openCasa()" class="aba-option">casa</button>
        <button id="btn-aba-apartamento" onclick="openApartamento()" class="aba-option">apartamento</button>
        <button id="btn-aba-terreno" onclick="openTerreno()" class="aba-option">terreno</button>
    </div>
    <form id="adicionar-casa-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data">
        
        <h1 id="casa-titulo">Adicionar casa</h1>
        @csrf
        <input type="hidden" name="id_produto" value="2" required>

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" id="casa-titulo-input" name="titulo" class="add-input" required>

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input" required></textarea>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="casa-qtd-banheiro-valor">0</span></p>
        <input type="range" name="qtd-banheiros"  min="1" max="3" value="1" id="casa-qtd-banheiros" class="slider">

        <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="casa-qtd-quarto-valor">0</span></p>
        <input type="range" name="qtd-quartos"  min="1" max="3" value="1" id="casa-qtd-quartos" class="slider">

        <p id="qtd-vagas-label" class="slider-label">Quantidade de vagas: <span id="casa-qtd-vaga-valor">0</span></p>
        <input type="range" name="qtd-vagas"  min="1" max="3" value="1" id="casa-qtd-vagas" class="slider">

        <p id="local-label">Localidade</p>
        <input name="localidade" type="text" id="casa-local-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p id="valor-label">Valor</p>
        <input type="number" name="valor" id="casa-valor-input" min="1" class="add-input">

        <p id="imagem-label">Imagem</p>
        <input type="file" name="imagem[]" id="imagem" multiple required>

        <button type="submit" id="btn-casa-enviar" class="btn-add-prod">Enviar</button>
    </form>

    <form id="adicionar-apartamento-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data">
        <h1 id="apartamento-titulo">Adicionar apartamento</h1>
        @csrf
        <input type="hidden" name="id_produto" value="3">

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" name="titulo" id="apt-titulo-input" class="add-input">

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="apt-desc-input" cols="30" rows="10" class="add-input"></textarea>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="apt-qtd-banheiro-valor">0</span></p>
        <input type="range" name="qtd-banheiros"  min="1" max="3" value="1" id="apt-qtd-banheiros" class="slider">

        <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="apt-qtd-quarto-valor">0</span></p>
        <input type="range" name="qtd-quartos"  min="1" max="3" value="1" id="apt-qtd-quartos" class="slider">

        <p id="qtd-vagas-label" class="slider-label">Quantidade de vagas: <span id="apt-qtd-vaga-valor">0</span></p>
        <input type="range" name="qtd-vagas"  min="1" max="3" value="1" id="apt-qtd-vagas" class="slider">

        <p id="local-label">Localidade</p>
        <input name="localidade" type="text" id="apt-local-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="number" id="apt-tam-area-input" min="1" class="add-input" >


        <p id="valor-label">Valor</p>
        <input type="number" name="valor" id="apt-valor-input" min="1" class="add-input">

        <p>Imagem</p>
        <input type="file" name="imagem[]" id="imagem" multiple required>

        <button id="btn-apt-enviar" onclick="simularSalvamento_apt()" class="btn-add-prod">Enviar</button>
    </form>


    <form id="adicionar-terreno-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data">

        <h1 id="terreno-titulo">Adicionar terreno</h1>
        @csrf
        <input type="hidden" name="id_produto" value="1">

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input name="titulo" type="text" id="trn-titulo-input" class="add-input">

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="trn-desc-input" cols="30" rows="10" class="add-input"></textarea>

        <p id="local-label">Localidade</p>
        <input name="localidade" type="text" id="trn-local-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="number" id="trn-tam-area-input" min="1" class="add-input">

        <p id="valor-label">Valor</p>
        <input type="number" name="valor" id="trn-valor-input" min="1" class="add-input">

        <p>Imagem</p>
        <input type="file" name="imagem[]" id="imagem" multiple required>

        <button type="submit" id="btn-trn-enviar" class="btn-add-prod">Enviar</button>
    </form>

    <script src="{{ asset('js/cadastro-abas.js') }}"></script>
</body>
</html>
