<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="add.css">
    <form id="adicionar-apartamento-container" class="add-layout" action="/salvar/{{ $item->id }}" method="post" enctype="multipart/form-data">
        <h1 id="apartamento-titulo">Adicionar apartamento</h1>
        @csrf
        <input type="hidden" name="id_produto" value="3">

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" name="titulo" id="apt-titulo-input" class="add-input" value="{{ $item->titulo }}">

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="apt-desc-input" cols="30" rows="10" class="add-input"></textarea>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="apt-qtd-banheiro-valor">0</span></p>
        <input type="range" name="qtd-banheiros"  min="1" max="3" value="1" id="apt-qtd-banheiros" class="slider">

        <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="apt-qtd-quarto-valor">0</span></p>
        <input type="range" name="qtd-quartos"  min="1" max="3" value="1" id="apt-qtd-quartos" class="slider">

        <p id="qtd-vagas-label" class="slider-label">Quantidade de vagas: <span id="apt-qtd-vaga-valor">0</span></p>
        <input type="range" name="qtd-vagas"  min="1" max="3" value="1" id="apt-qtd-vagas" class="slider">

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="number" id="apt-tam-area-input" min="1" class="add-input" >

        <p id="valor-label">Valor</p>
        <input type="number" name="valor" id="apt-valor-input" min="1" class="add-input">

        <p>Imagem</p>
        <input type="file" name="imagem[]" id="imagem" multiple required>

        <button type="submit" id="btn-apt-enviar" class="btn-add-prod">Salvar</button>
    </form>
</body>
</html>
