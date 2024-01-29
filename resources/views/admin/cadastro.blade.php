@extends('layouts.font_import')

@section('title','Cadastrar produto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/font-standards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cadastro-imovel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/imagem.js') }}"></script>
    <script src="{{ asset('js/numformat.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <button id="btn-voltar" onclick="window.location.href = '/admin'">Voltar</button>

    <div id="titleAdicionar">
        <h2>Adicionar</h2>
    </div>

    <div id="abas">
        <button id="btn-aba-casa" onclick="openCasa()" class="aba-option">Casa/Ap/Chácara</button>
        <button id="btn-aba-apartamento" onclick="openApartamento()" class="aba-option">Pt. Comercial</button>
        <button id="btn-aba-terreno" onclick="openTerreno()" class="aba-option">Terreno</button>
    </div>
    
    <form id="adicionar-casa-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <!-- <input type="hidden" name="id_produto" value="2" > -->

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" id="casa-titulo-input" name="titulo" class="add-input" required>

        <p>Tipo do imóvel</p>
        <select name="id_produto" id="tipo-produto-ddl" class="add-input">
            <option value="2" selected>Casa</option>
            <option value="3">Apartamento</option>
            <option value="4">Chácara</option>
        </select>

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input" required></textarea>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="sliderValueBanheiro">1</span></p>
        <input type="range" name="qtd_banheiros" min="0" max="20" value="1" id="sliderBanheiro" class="slider" required>

        <p id="qtd-banheiros-label" class="slider-label">Quantidade de suites: <span id="sliderValueSuite">1</span></p>
        <input type="range" name="qtd_suites" min="0" max="20" value="1" id="sliderSuite" class="slider" required>

        <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="sliderValueQuartos">1</span></p>
        <input type="range" name="qtd_quartos" min="0" max="20" value="1" id="sliderQuartos" class="slider" required>

        <p id="qtd-vagas-label" class="slider-label">Quantidade de Garagem com Cobertura: <span id="sliderValueVagas">1</span></p>
        <input type="range" name="qtdGaragemCobertas" min="0" max="20" value="1" id="sliderVagas" class="slider" required>

        <p id="qtd-vagas-label" class="slider-label">Quantidade de Garagem sem Cobertura: <span id="sliderValueVagasNaoCoberto">1</span></p>
        <input type="range" name="qtdGaragemNaoCobertas" min="0" max="20" value="1" id="sliderVagasNaoCoberto" class="slider" required>

        <p id="qtd-salas-label" class="slider-label">Quantidade de Salas: <span id="sliderValueSalas">1</span></p>
        <input type="range" name="qtdSalas" min="0" max="20" value="1" id="sliderSalas" class="slider" required>

        <p id="qtd-dorms-label" class="slider-label">Quantidade de Dormitórios: <span id="sliderValueDorms">1</span></p>
        <input type="range" name="qtdDorms" min="0" max="20" value="1" id="sliderDorms" class="slider" required>

        <p id="local-label">Cidade</p>
        <input name="cidade" type="text" id="casa-local-input" class="add-input" required>

        <p id="local-label">Bairro</p>
        <input name="bairro" type="text" id="casa-local-input" class="add-input" required>

        <p id="local-label">Rua e Numero</p>
        <input name="ruaNumero" type="text" id="casa-local-input" class="add-input" required>

        <p id="local-label">CEP</p>
        <input name="cep" maxlength="8" minlength="8" type="text" id="casa-local-input" min="1" class="add-input" oninput="formatarCEP(this)" required>

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="text" id="casa-tam-area-input" min="1" class="add-input input-format" step=".01" lang="pt-BR" required>

        <p id="tam-area-label">Tamanho da área util (m<sup>2</sup>)</p>
        <input name="areaUtil" type="text" id="casa-tam-area-input" min="1" class="add-input input-format" step=".01" lang="pt-BR">

        <p id="tam-area-label">Tamanho da área construída (m<sup>2</sup>)</p>
        <input name="areaConstruida" type="text" id="casa-tam-area-input" min="1" class="add-input input-format" step=".01" lang="pt-BR">

        <p id="tam-area-label">Tamanho da área do terreno (m<sup>2</sup>)</p>
        <input name="areaTerreno" type="text" id="casa-tam-area-input" min="1" class="add-input input-format" step=".01" lang="pt-BR">

        <p>Aluguel ou Venda</p>
        <select name="tp_contrato" id="" class="add-input" required>
            <option value="Aluguel">Aluguel</option>
            <option value="Venda">Venda</option>
        </select>

        <p id="valor-label">Valor</p>
        <input type="text" name="valor" id="casa-valor-input" class="add-input input-format" step=".01" lang="pt-BR" required>

        <p id="valor-label">Valor condominio</p>
        <input type="text" name="valorCondominio" id="casa-valor-input" class="add-input input-format" lang="pt-BR" step=".01">

        <p id="valor-label">IPTU mensal</p>
        <input type="text" name="iptu" id="casa-valor-input" class="add-input input-format" lang="pt-BR" step=".01">

        <p id="valor-label">Caracterísitcas do imóvel</p>
        <div class="checkbox">
            <div class="check-item">
                <input type="checkbox" name="agua" id="agua"><label for="agua">Agua</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="energia" id="energia"><label for="energia">Energia</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="esgoto" id="esgoto"><label for="esgoto">Esgoto</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="murado" id="murado"><label for="murado">Murado</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="pavimentação" id="pavimentação"><label for="pavimentação">Pavimentação</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="gasEncanado" id="gasEncanado"><label for="gasEncanado">Gás encanado</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="entradaServico" id="entradaServico"><label for="entradaServico">Entrada de serviço</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="areaServico" id="areaServico"><label for="areaServico">Área de serviço</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="banheiroEmpregada" id="banheiroEmpregada"><label for="banheiroEmpregada">Banheiro Empregada</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="cozinha" id="cozinha"><label for="cozinha">Cozinha</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="cozinhaPlanejada" id="cozinhaPlanejada"><label for="cozinhaPlanejada">Cozinha Planejada</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="despensa" id="despensa"><label for="despensa">Despensa</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="lavanderias" id="lavanderias"><label for="lavanderias">Lavanderia</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="guarita" id="guarita"><label for="guarita">Guarita</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="portaria24" id="portaria24"><label for="portaria24">Portaria 24h</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="varanda" id="varanda"><label for="varanda">Varanda</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="varandaGourmet" id="varandaGourmet"><label for="varandaGourmet">Varanda Gourmet</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="churrasqueira" id="churrasqueira"><label for="churrasqueira">Churrasqueira</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="cozinhaConjugada" id="cozinhaConjugada"><label for="cozinhaConjugada">Cozinha conjugada</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="pisoFrio" id="pisoFrio"><label for="pisoFrio">Piso Frio</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="porcelanato" id="porcelanato"><label for="porcelanato">Porcelanato</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="lavado" id="lavado"><label for="lavado">Lavabo</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="roupeiro" id="roupeiro"><label for="roupeiro">Roupeiro</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="suiteMaster" id="suiteMaster"><label for="suiteMaster">Suite Master</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="closet" id="closet"><label for="closet">Closet</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="entradaServico" id="entradaServico"><label for="entradaServico">Entrada de serviço</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="escritorio" id="escritorio"><label for="escritorio">Escritorio</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="jardim" id="jardim"><label for="jardim">Jardim</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="moveisPlanejados" id="moveisPlanejados"><label for="moveisPlanejados">Moveis planejados</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="portaoEletronico" id="portaoEletronico"><label for="portaoEletronico">Portão eletronico</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="porteiroEletronico" id="porteiroEletronico"><label for="porteiroEletronico">Porteiro eletronico</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="quintal" id="quintal"><label for="quintal">Quintal</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="areaLazer" id="areaLazer"><label for="areaLazer">Área de lazer</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="churrasqueira" id="churrasqueira"><label for="churrasqueira">Churrasqueira</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="playground" id="playground"><label for="playground">Playground</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="quadra" id="quadra"><label for="quadra">Quadra Esportiva</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="tvCabo" id="tvCabo"><label for="tvCabo">TV a Cabo</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="arCondicionado" id="arCondicionado"><label for="arCondicionado">Ar Condicionado</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="alarme" id="alarme"><label for="alarme">Alarme</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="aguaSolar" id="aguaSolar"><label for="aguaSolar">Agua Aquecida por Energia Solar</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="mobiliado" id="mobiliado"><label for="mobiliado">Mobiliado</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="depEmpregados" id="depEmpregados"><label for="depEmpregados">Dep. Empregados</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="lareira" id="lareira"><label for="lareira">Lareira</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="caseiro" id="caseiro"><label for="caseiro">Caseiro</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="edicula" id="edicula"><label for="edicula">Edícula</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="piscina" id="piscina"><label for="piscina">Piscina</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="piscinaCondominio" id="piscinaCondominio"><label for="piscinaCondominio">Piscina Condomínio</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="terraco" id="terraco"><label for="terraco">Terraço</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="hidromassagem" id="hidromassagem"><label for="hidromassagem">Hidromassagem</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="jardimInverno" id="jardimInverno"><label for="jardimInverno">Jardim de Inverno</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoAquecido" id="pisoAquecido"><label for="pisoAquecido">Piso Aquecido</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoArdosia" id="pisoArdosia"><label for="pisoArdosia">Piso Ardosia</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoBioquete" id="pisoBioquete"><label for="pisoBioquete">Piso Bioquete</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoCarpete" id="pisoCarpete"><label for="pisoCarpete">Piso Carpete</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoCeramica" id="pisoCeramica"><label for="pisoCeramica">Piso cerâmica</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoCimentoQueimado" id="pisoCimentoQueimado"><label for="pisoCimentoQueimado">Piso Cimento Queimado</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoEmborrachado" id="pisoEmborrachado"><label for="pisoEmborrachado">Piso Emborrachado</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoTacoMadeira" id="pisoTacoMadeira"><label for="pisoTacoMadeira">Piso de Taco de Madeira</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="contraPiso" id="contraPiso"><label for="contraPiso">Contra Piso</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="pisoTabua" id="pisoTabua"><label for="pisoTabua">Piso de Tábua</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="granito" id="granito"><label for="granito">Granito</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="marmore" id="marmore"><label for="marmore">Mármore</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioCozinha" id="armarioCozinha"><label for="armarioCozinha">Armário Cozinha</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioCorredor" id="armarioCorredor"><label for="armarioCorredor">Armário Corredor</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioCloset" id="armarioCloset"><label for="armarioCloset">Armário Closet</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioQuarto" id="armarioQuarto"><label for="armarioQuarto">Armário Quarto</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioBanheiro" id="armarioBanheiro"><label for="armarioBanheiro">Armário Banheiro</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioSala" id="armarioSala"><label for="armarioSala">Armário Sala</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioEscritorio" id="armarioEscritorio"><label for="armarioEscritorio">Armário Escritório</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioDepEmp" id="armarioDepEmp"><label for="armarioDepEmp">Armário Dep. Empregado</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="armarioAreaServico" id="armarioAreaServico"><label for="armarioAreaServico">Armário Área de Serviço</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="salaCinema" id="salaCinema"><label for="salaCinema">Sala de Cinema</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="adega" id="adega"><label for="adega">Adega</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="sauna" id="sauna"><label for="sauna">Sauna</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="campFut" id="campFut"><label for="campFut">Campo de Futebol</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="salaJogos" id="salaJogos"><label for="salaJogos">Sala de Jogos</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="salaFestas" id="salaFestas"><label for="salaFestas">Sala de Festas</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="salaGinastica" id="salaGinastica"><label for="salaGinastica">Sala de Ginástica</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="estacionamentoVisita" id="estacionamentoVisita"><label for="estacionamentoVisita">Estacionamento para Visita</label>
            </div>
        </div>

        <hr class="cadastro-divisor">

        <p id="imagem-label">Imagem <span class="image-warning">(Adicionar todas as imagens de uma vez)</span></p>
        <input type="file" name="imagem[]" id="imagemCasa" multiple required>

        <input type="file" name="imagemCasaPrincipal" id="imagemCasaPrincipal" style="display: none" required>

        <div id="imagePreviewCasa"></div>

        <div class="divBtnEnviar">
            <button type="submit" id="btn-casa-enviar" class="btn-add-prod">SALVAR</button>
        </div>
    </form>

<!-- PONTO COMERCIAL -->
    <form id="adicionar-apartamento-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="id_produto" value="5">

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" id="casa-titulo-input" name="titulo" class="add-input" required>

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input" required></textarea>

        <p for="" id="desc-label" class="add-label">Tipo de Comercial</p>
        <textarea name="tipoComercio" id="casa-desc-input" cols="30" rows="10" class="add-input" maxlength="500" required></textarea>

        <p id="local-label">Cidade</p>
        <input name="cidade" type="text" id="casa-local-input" min="1" class="add-input" required>

        <p id="local-label">Bairro</p>
        <input name="bairro" type="text" id="casa-local-input" min="1" class="add-input" required>

        <p id="local-label">Rua e Numero</p>
        <input name="ruaNumero" type="text" id="casa-local-input" min="1" class="add-input" required>

        <p id="local-label">CEP</p>
        <input name="cep" maxlength="8" minlength="8" type="text" id="casa-local-input" min="1" class="add-input" oninput="formatarCEP(this)" required>

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="text" id="casa-tam-area-input" min="1" class="add-input input-format" step=".01" lang="pt-BR" required>

        <p>Aluguel ou Venda</p>
        <select name="tp_contrato" id="" class="add-input" required>
            <option value="Aluguel">Aluguel</option>
            <option value="Venda">Venda</option>
        </select>

        <p id="valor-label">Valor</p>
        <input type="text" name="valor" id="casa-valor-input" class="add-input input-format" step=".01" lang="pt-BR" required>

        <p id="valor-label">Valor condominio</p>
        <input type="text" name="valorCondominio" id="casa-valor-input" class="add-input input-format" step=".01" lang="pt-BR">

        <p id="valor-label">IPTU mensal</p>
        <input type="text" name="iptu" id="casa-valor-input" class="add-input input-format" step=".01" lang="pt-BR">

        <p id="valor-label">Características</p>
        <div class="checkbox">

            <div class="check-item">
                <input type="checkbox" name="elevador" id="elevador"><label for="elevador">Elevador</label>
            </div>
            
            <div class="check-item">
                <input type="checkbox" name="copa" id="copa"><label for="copa">Copa</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="recepcao" id="recepcao"><label for="recepcao">Recepcao</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="mesanino" id="mesanino"><label for="mesanino">Mesanino</label>
            </div>
            
            <div class="check-item">
                <input type="checkbox" name="luminarias" id="luminarias"><label for="luminarias">Luminarias</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="acessoDeficiente" id="acessoDeficiente"><label for="acessoDeficiente">Acesso para Deficientes</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="geradorEnergia" id="geradorEnergia"><label for="geradorEnergia">Gerador de Energia Elétrica</label>
            </div>

            <div class="check-item">
                <input type="checkbox" name="telefonia" id="telefonia"><label for="telefonia">Telefonia</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="rede" id="rede"><label for="rede">Rede de Internet</label>
            </div>

             
        </div>

        <hr class="cadastro-divisor">

        <!-- TERRENO -->
        <p>Imagem <span class="image-warning">(Adicionar todas as imagens de uma vez)</span></p>
        <input type="file" name="imagem[]" id="imagemAp" multiple required>

        <input type="file" name="imagemApPrincipal" id="imagemApPrincipal" style="display: none">

        <div id="imagePreviewAp"></div>

        <div class="divBtnEnviar">
            <button id="btn-apt-enviar" class="btn-add-prod">SALVAR</button>
        </div>
    </form>

<!-- TERRENO -->
    <form id="adicionar-terreno-container" class="add-layout" action="cadastrar" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="id_produto" value="1">

        <p for="" id="titulo-label" class="add-label">Título</p>
        <input name="titulo" type="text" id="trn-titulo-input" class="add-input" required>

        <p for="" id="desc-label" class="add-label">Descrição</p>
        <textarea name="descricao" id="trn-desc-input" cols="30" rows="10" class="add-input" required></textarea>

        <p id="local-label">Cidade</p>
        <input name="cidade" type="text" id="casa-local-input" min="1" class="add-input" required>

        <p id="local-label">Bairro</p>
        <input name="bairro" type="text" id="casa-local-input" min="1" class="add-input" required>

        <p id="local-label">Rua e Numero</p>
        <input name="ruaNumero" type="text" id="casa-local-input" min="1" class="add-input" required>

        <p id="local-label">CEP</p>
        <input name="cep" maxlength="8" minlength="8" type="text" id="casa-local-input" min="1" class="add-input" oninput="formatarCEP(this)" required>

        <p id="tam-area-label">Tamanho da área (m<sup>2</sup>)</p>
        <input name="area" type="text" id="trn-tam-area-input" min="1" class="add-input input-format" required>

        <p id="tam-area-label">Metragem da Frente</p>
        <input name="metragemFrente" type="text" id="trn-tam-area-input" min="1" class="add-input input-format" required>

        <p id="tam-area-label">Metragem Lateral</p>
        <input name="metragemFundo" type="text" id="trn-tam-area-input" min="1" class="add-input input-format" required>

        <p id="tam-area-label">Lateral Esquerda</p>
        <input name="metragemDireita" type="text" id="trn-tam-area-input" min="1" class="add-input input-format" required>

        <p id="tam-area-label">Lateral Direita</p>
        <input name="metragemEsquerda" type="text" id="trn-tam-area-input" min="1" class="add-input input-format" required>

        <p id="tam-area-label">Posição do terreno</p>
        <select name="posTerreno" id="tipo-produto-ddl" class="add-input">
            <option value="meio de quadra" selected>meio de quadra</option>
            <option value="esquina">esquina</option>
            <option value="divisa com muro">divisa com muro</option>
        </select>

        <p id="tam-area-label">Forma do terreno</p>
        <select name="formaTerreno" id="tipo-produto-ddl" class="add-input">
            <option value="regular" selected>regular</option>
            <option value="irregular">irregular</option>
            <option value="poligonal">poligonal</option>
        </select>

        <p id="tam-area-label">Vegetação</p>
        <select name="vegetacao" id="tipo-produto-ddl" class="add-input">
            <option value="mato" selected>mato</option>
            <option value="gramado">gramado</option>
            <option value="limpo">limpo</option>
        </select>

        <p id="tam-area-label">Proteção</p>
        <select name="protecao" id="tipo-produto-ddl" class="add-input">
            <option value="muro" selected>muro</option>
            <option value="cerca">cerca</option>
            <option value="divisão com prédio">divisão com prédio</option>
        </select>

        <p id="tam-area-label">Topografia</p>
        <select name="topografia" id="tipo-produto-ddl" class="add-input">
            <option value="plano" selected>plano</option>
            <option value="aclive">aclive</option>
            <option value="declive">declive</option>
        </select>

        
        
        <p id="valor-label">Valor</p>
        <input type="text" name="valor" id="trn-valor-input" class="add-input input-format" lang="pt-BR" required>

        <p id="valor-label">Valor condominio</p>
        <input type="text" name="valorCondominio" id="casa-valor-input" class="add-input input-format" lang="pt-BR">

        <p id="valor-label">IPTU mensal</p>
        <input type="text" name="iptu" id="casa-valor-input" class="add-input input-format" lang="pt-BR">

        <p>Características do Terreno</p>
        <div class="checkbox">
            <div class="check-item">
                <input type="checkbox" name="acessoEnergia" id="acessoEnergia"><label for="acessoEnergia">Acesso a Energia Elétrica</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="escola" id="escola"><label for="escola">Escola</label>
            </div>
            <div class="check-item">
                <input type="checkbox" name="comercio" id="comercio"><label for="comercio">Comercio</label>
            </div>
        </div>

        <hr class="cadastro-divisor">
        <p>Imagem <span class="image-warning">(Adicionar todas as imagens de uma vez)</span></p>
        <input type="file" name="imagem[]" id="imagemTerreno" multiple required>

        <input type="file" name="imagemTerrenoPrincipal" id="imagemTerrenoPrincipal" style="display: none">

        <div id="imagePreviewTerreno"></div>

        <div class="divBtnEnviar">
            <button type="submit" id="btn-trn-enviar" class="btn-add-prod">SALVAR</button>
        </div>
    </form>

    <script src="{{ asset('js/cadastro-abas.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/imagemPrincipalAlert.js') }}"></script>


    <script>
        function formatarCEP(input) {
            // Remove caracteres não numéricos
            let cep = input.value.replace(/\D/g, '');

            // Adiciona a máscara
            if (cep.length === 8) {
                cep = cep.replace(/(\d{5})(\d{3})/, '$1-$2');
                input.value = cep;
            }
        }
    </script>

<script>

    // document.getElementById('adicionar-casa-container').addEventListener('submit', function(event) {
    //     // Impede o envio padrão do formulário
    // event.preventDefault();

    //     // Chame a função antesDoEnvio() e envie o formulário apenas se a função retornar true
    //     if (formatarInput()) {
    //     this.submit(); // Isso envia o formulário
    //     }
    // })

</script>

@endsection
