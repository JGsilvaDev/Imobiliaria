@extends('layouts.font_import')

@section('title','Cadastrar produto')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/cadastro-imovel.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/imagem.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <div id="abas">
        <button id="btn-aba-casa" onclick="openCasa()" class="aba-option">casa</button>
        <button id="btn-aba-apartamento" onclick="openApartamento()" class="aba-option">apartamento</button>
        <button id="btn-aba-terreno" onclick="openTerreno()" class="aba-option">terreno</button>
    </div>
    <form id="adicionar-casa-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">

        <h1 id="casa-titulo">Adicionar casa</h1>
        @csrf
        <input type="hidden" name="id_produto" value="2" >

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" id="casa-titulo-input" name="titulo" class="add-input" >

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input"></textarea>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="sliderValueBanheiroCasa">1</span></p>
        <input type="range" name="qtd_banheiros" min="0" max="5" value="1" id="sliderBanheiroCasa" class="slider">

        <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="sliderValueQuartosCasa">1</span></p>
        <input type="range" name="qtd_quartos" min="0" max="5" value="1" id="sliderQuartosCasa" class="slider">

        <p id="qtd-vagas-label" class="slider-label">Quantidade de vagas: <span id="sliderValueVagasCasa">1</span></p>
        <input type="range" name="qtd_vagas" min="0" max="5" value="1" id="sliderVagasCasa" class="slider">

        <p id="local-label">Localidade</p>
        <input name="localidade" type="text" id="casa-local-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p id="valor-label">Valor</p>
        <input type="number" name="valor" id="casa-valor-input" min="1" class="add-input">

        <p>Aluguel ou Venda</p>
        <select name="tp_contrato" id="">
            <option value="Aluguel">Alguel</option>
            <option value="Venda">Venda</option>
        </select>

        <p id="imagem-label">Imagem</p>
        <input type="file" name="imagem[]" id="imagemCasa" multiple>

        <input type="file" name="imagemCasaPrincipal" id="imagemCasaPrincipal">

        <div id="imagePreviewCasa"></div>

        <button type="submit" id="btn-casa-enviar" class="btn-add-prod">Enviar</button>
    </form>

    <form id="adicionar-apartamento-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">
        <h1 id="apartamento-titulo">Adicionar apartamento</h1>
        @csrf
        <input type="hidden" name="id_produto" value="3">

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" name="titulo" id="apt-titulo-input" class="add-input">

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="apt-desc-input" cols="30" rows="10" class="add-input"></textarea>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="sliderValueBanheirosAp">1</span></p>
        <input type="range" name="qtd-banheiros"  min="0" max="5" value="1" id="sliderBanheirosAp" class="slider">

        <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="sliderValueQuartosAp">1</span></p>
        <input type="range" name="qtd-quartos"  min="0" max="5" value="1" id="sliderQuartosAp" class="slider">

        <p id="qtd-vagas-label" class="slider-label">Quantidade de vagas: <span id="sliderValueVagasAp">1</span></p>
        <input type="range" name="qtd-vagas"  min="0" max="5" value="1" id="sliderVagasAp" class="slider">

        <p id="local-label">Localidade</p>
        <input name="localidade" type="text" id="apt-local-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="number" id="apt-tam-area-input" min="1" class="add-input" >

        <p id="valor-label">Valor</p>
        <input type="number" name="valor" id="apt-valor-input" min="1" class="add-input">

        <p>Aluguel ou Venda</p>
        <select name="tp_contrato" id="">
            <option value="Aluguel">Alguel</option>
            <option value="Venda">Venda</option>
        </select>

        <p>Imagem</p>
        <input type="file" name="imagem[]" id="imagemAp" multiple required>

        <div id="imagePreviewAp"></div>

        <button id="btn-apt-enviar" class="btn-add-prod">Enviar</button>
    </form>


    <form id="adicionar-terreno-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">

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
        <input type="file" name="imagem[]" id="imagemTerreno" multiple required>

        <div id="imagePreviewTerreno"></div>

        <button type="submit" id="btn-trn-enviar" class="btn-add-prod">Enviar</button>
    </form>

    <script src="{{ asset('js/cadastro-abas.js') }}"></script>
@endsection
