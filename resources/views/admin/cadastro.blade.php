@extends('layouts.font_import')

@section('title','Cadastrar produto')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/cadastro-imovel.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/imagem.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <div id="titleAdicionar">
        <h2>Adicionar</h2>
    </div>

    <div id="abas">
        <button id="btn-aba-casa" onclick="openCasa()" class="aba-option">Casa</button>
        <button id="btn-aba-apartamento" onclick="openApartamento()" class="aba-option">Apartamento</button>
        <button id="btn-aba-terreno" onclick="openTerreno()" class="aba-option">Terreno</button>
    </div>
    <form id="adicionar-casa-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="id_produto" value="2" >

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" id="casa-titulo-input" name="titulo" class="add-input" >

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input"></textarea>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="sliderValueBanheiroCasa">1</span></p>
        <input type="range" name="qtd_banheiros" min="0" max="50" value="1" id="sliderBanheiroCasa" class="slider">

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de suites: <span id="sliderValueSuiteCasa">1</span></p>
        <input type="range" name="qtd_suites" min="0" max="50" value="1" id="sliderSuiteCasa" class="slider">

        <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="sliderValueQuartosCasa">1</span></p>
        <input type="range" name="qtd_quartos" min="0" max="50" value="1" id="sliderQuartosCasa" class="slider">

        <p id="qtd-vagas-label" class="slider-label">Quantidade de vagas: <span id="sliderValueVagasCasa">1</span></p>
        <input type="range" name="qtd_vagas" min="0" max="50" value="1" id="sliderVagasCasa" class="slider">

        <p id="local-label">Localidade</p>
        <input name="localidade" type="text" id="casa-local-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área util (m<sup>2</sup>)</p>
        <input name="areaUtil" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área contruida (m<sup>2</sup>)</p>
        <input name="areaConstruida" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área do terreno (m<sup>2</sup>)</p>
        <input name="areaTerreno" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p>Aluguel ou Venda</p>
        <select name="tp_contrato" id="">
            <option value="Aluguel">Alguel</option>
            <option value="Venda">Venda</option>
        </select>

        <p id="valor-label">Valor</p>
        <input type="number" name="valor" id="casa-valor-input" min="1" class="add-input">

        <p id="valor-label">Valor condominio</p>
        <input type="number" name="valorCondominio" id="casa-valor-input" min="1" class="add-input">

        <p id="valor-label">IPTU mensal</p>
        <input type="number" name="iptu" id="casa-valor-input" min="1" class="add-input">

        <p id="valor-label">Básico</p>
        <div>
            <input type="checkbox" name="agua" id="agua"><label>Agua</label>
            <input type="checkbox" name="energia" id="energia"><label>Energia</label>
            <input type="checkbox" name="esgoto" id="esgoto"><label>Esgoto</label>
            <input type="checkbox" name="murado" id="murado"><label>Murado</label>
            <input type="checkbox" name="pavimentação" id="pavimentação"><label>Pavimentação</label>
        </div>

        <p id="valor-label">Serviços</p>
        <div>
            <input type="checkbox" name="areaServico" id="areaServico"><label>Área de serviço</label>
            <input type="checkbox" name="banheiroAux" id="banheiroAux"><label>Banheiro Auxiliar</label>
            <input type="checkbox" name="banheiroEmpregada" id="banheiroEmpregada"><label>Banheiro Empregada</label>
            <input type="checkbox" name="cozinha" id="cozinha"><label>Cozinha</label>
            <input type="checkbox" name="cozinhaPlanejada" id="cozinhaPlanejada"><label>Cozinha Planejada</label>
            <input type="checkbox" name="despensa" id="despensa"><label>Despensa</label>
            <input type="checkbox" name="lavanderias" id="lavanderias"><label>Lavanderia</label>
            <input type="checkbox" name="guarita" id="guarita"><label>Guarita</label>
            <input type="checkbox" name="portaria24" id="portaria24"><label>Portaria 24h</label>
        </div>

        <p id="valor-label">Lazer</p>
        <div>
            <input type="checkbox" name="areaLazer" id="areaLazer"><label>Área de lazer</label>
            <input type="checkbox" name="churrasqueira" id="churrasqueira"><label>Churrasqueira</label>
            <input type="checkbox" name="playground" id="playground"><label>Playground</label>
            <input type="checkbox" name="quadra" id="quadra"><label>Quadra esportiva</label>
        </div>

        <p id="valor-label">Social</p>
        <div>
            <input type="checkbox" name="varanda" id="varanda"><label>Varanda</label>
            <input type="checkbox" name="varandaGourmet" id="varandaGourmet"><label>Varanda Gourmet</label>
        </div>

        <p id="valor-label">Acabamento</p>
        <div>
            <input type="checkbox" name="pisoFrio" id="pisoFrio"><label>Piso Frio</label>
            <input type="checkbox" name="porcelanato" id="porcelanato"><label>Porcelanato</label>
        </div>

        <p id="valor-label">Intima</p>
        <div>
            <input type="checkbox" name="lavado" id="lavado"><label>Lavado</label>
            <input type="checkbox" name="roupeiro" id="roupeiro"><label>Roupeiro</label>
            <input type="checkbox" name="suiteMaster" id="suiteMaster"><label>Suite Master</label>
            <input type="checkbox" name="closet" id="closet"><label>Closet</label>
        </div>

        <p id="valor-label">Destaques</p>
        <div>
            <input type="checkbox" name="entradaServico" id="entradaServico"><label>Entrada de serviço</label>
            <input type="checkbox" name="escritorio" id="escritorio"><label>Escritorio</label>
            <input type="checkbox" name="jardim" id="jardim"><label>Jardim</label>
            <input type="checkbox" name="moveisPlanejados" id="moveisPlanejados"><label>Moveis planejados</label>
            <input type="checkbox" name="portaoEletronico" id="portaoEletronico"><label>Portão eletronico</label>
            <input type="checkbox" name="quintal" id="quintal"><label>Quintal</label>
        </div>

        <p id="imagem-label">Imagem</p>
        <input type="file" name="imagem[]" id="imagemCasa" multiple>

        <input type="file" name="imagemCasaPrincipal" id="imagemCasaPrincipal" style="display: none">

        <div id="imagePreviewCasa"></div>

        <div class="divBtnEnviar">
            <button type="submit" id="btn-casa-enviar" class="btn-add-prod">SALVAR</button>
        </div>
    </form>

    <form id="adicionar-apartamento-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="id_produto" value="3">
        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" id="casa-titulo-input" name="titulo" class="add-input" >

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input"></textarea>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="sliderValueBanheiroCasa">1</span></p>
        <input type="range" name="qtd_banheiros" min="0" max="50" value="1" id="sliderBanheiroCasa" class="slider">

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de suites: <span id="sliderValueSuiteAp">1</span></p>
        <input type="range" name="qtd_suites" min="0" max="50" value="1" id="sliderSuiteAp" class="slider">

        <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="sliderValueQuartosCasa">1</span></p>
        <input type="range" name="qtd_quartos" min="0" max="50" value="1" id="sliderQuartosCasa" class="slider">

        <p id="qtd-vagas-label" class="slider-label">Quantidade de vagas: <span id="sliderValueVagasCasa">1</span></p>
        <input type="range" name="qtd_vagas" min="0" max="50" value="1" id="sliderVagasCasa" class="slider">

        <p id="local-label">Localidade</p>
        <input name="localidade" type="text" id="casa-local-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área util (m<sup>2</sup>)</p>
        <input name="areaUtil" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área contruida (m<sup>2</sup>)</p>
        <input name="areaConstruida" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p id="tam-area-label">Tamanho da área do terreno (m<sup>2</sup>)</p>
        <input name="areaTerreno" type="number" id="casa-tam-area-input" min="1" class="add-input">

        <p>Aluguel ou Venda</p>
        <select name="tp_contrato" id="">
            <option value="Aluguel">Alguel</option>
            <option value="Venda">Venda</option>
        </select>

        <p id="valor-label">Valor</p>
        <input type="number" name="valor" id="casa-valor-input" min="1" class="add-input">

        <p id="valor-label">Valor condominio</p>
        <input type="number" name="valorCondominio" id="casa-valor-input" min="1" class="add-input">

        <p id="valor-label">IPTU mensal</p>
        <input type="number" name="iptu" id="casa-valor-input" min="1" class="add-input">

        <p id="valor-label">Básico</p>
        <div>
            <input type="checkbox" name="agua" id="agua"><label>Agua</label>
            <input type="checkbox" name="energia" id="energia"><label>Energia</label>
            <input type="checkbox" name="esgoto" id="esgoto"><label>Esgoto</label>
            <input type="checkbox" name="murado" id="murado"><label>Murado</label>
            <input type="checkbox" name="pavimentação" id="pavimentação"><label>Pavimentação</label>
        </div>

        <p id="valor-label">Serviços</p>
        <div>
            <input type="checkbox" name="areaServico" id="areaServico"><label>Área de serviço</label>
            <input type="checkbox" name="banheiroAux" id="banheiroAux"><label>Banheiro Auxiliar</label>
            <input type="checkbox" name="banheiroEmpregada" id="banheiroEmpregada"><label>Banheiro Empregada</label>
            <input type="checkbox" name="cozinha" id="cozinha"><label>Cozinha</label>
            <input type="checkbox" name="cozinhaPlanejada" id="cozinhaPlanejada"><label>Cozinha Planejada</label>
            <input type="checkbox" name="despensa" id="despensa"><label>Despensa</label>
            <input type="checkbox" name="lavanderias" id="lavanderias"><label>Lavanderia</label>
            <input type="checkbox" name="guarita" id="guarita"><label>Guarita</label>
            <input type="checkbox" name="portaria24" id="portaria24"><label>Portaria 24h</label>
        </div>

        <p id="valor-label">Lazer</p>
        <div>
            <input type="checkbox" name="areaLazer" id="areaLazer"><label>Área de lazer</label>
            <input type="checkbox" name="churrasqueira" id="churrasqueira"><label>Churrasqueira</label>
            <input type="checkbox" name="playground" id="playground"><label>Playground</label>
            <input type="checkbox" name="quadra" id="quadra"><label>Quadra esportiva</label>
        </div>

        <p id="valor-label">Social</p>
        <div>
            <input type="checkbox" name="varanda" id="varanda"><label>Varanda</label>
            <input type="checkbox" name="varandaGourmet" id="varandaGourmet"><label>Varanda Gourmet</label>
        </div>

        <p id="valor-label">Acabamento</p>
        <div>
            <input type="checkbox" name="pisoFrio" id="pisoFrio"><label>Piso Frio</label>
            <input type="checkbox" name="porcelanato" id="porcelanato"><label>Porcelanato</label>
        </div>

        <p id="valor-label">Intima</p>
        <div>
            <input type="checkbox" name="lavado" id="lavado"><label>Lavado</label>
            <input type="checkbox" name="roupeiro" id="roupeiro"><label>Roupeiro</label>
            <input type="checkbox" name="suiteMaster" id="suiteMaster"><label>Suite Master</label>
            <input type="checkbox" name="closet" id="closet"><label>Closet</label>
        </div>

        <p id="valor-label">Destaques</p>
        <div>
            <input type="checkbox" name="entradaServico" id="entradaServico"><label>Entrada de serviço</label>
            <input type="checkbox" name="escritorio" id="escritorio"><label>Escritorio</label>
            <input type="checkbox" name="jardim" id="jardim"><label>Jardim</label>
            <input type="checkbox" name="moveisPlanejados" id="moveisPlanejados"><label>Moveis planejados</label>
            <input type="checkbox" name="portaoEletronico" id="portaoEletronico"><label>Portão eletronico</label>
            <input type="checkbox" name="quintal" id="quintal"><label>Quintal</label>
        </div>

        <p>Imagem</p>
        <input type="file" name="imagem[]" id="imagemAp" multiple required>

        <input type="file" name="imagemApPrincipal" id="imagemApPrincipal" style="display: none">

        <div id="imagePreviewAp"></div>

        <div class="divBtnEnviar">
            <button id="btn-apt-enviar" class="btn-add-prod">SALVAR</button>
        </div>
    </form>

    <form id="adicionar-terreno-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">
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

        <input type="file" name="imagemTerrenoPrincipal" id="imagemTerrenoPrincipal" style="display: none">

        <div id="imagePreviewTerreno"></div>

        <div class="divBtnEnviar">
            <button type="submit" id="btn-trn-enviar" class="btn-add-prod">SALVAR</button>
        </div>
    </form>

    <script src="{{ asset('js/cadastro-abas.js') }}"></script>
@endsection
