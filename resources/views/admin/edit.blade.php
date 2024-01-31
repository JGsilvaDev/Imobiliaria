<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/cadastro-imovel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('js/softDelete.js') }}"></script>
    <script src="{{ asset('js/imagemEdit.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Edit Imovel</title>
</head>
<body>
<link rel="stylesheet" href="{{ asset('css/font-standards.css') }}">
<button id="btn-voltar" onclick="window.location.href = '/admin'">Voltar</button>
<div id="title-editar">
    <p>Editar</p>
</div>

<div id="tab-system">

    <div id="tab-buttons">
        <button onclick="openTab(0,'block')" class="tab-button tab-selected">Dados</button>
        <button onclick="openTab(1,'block')" class="tab-button tab-unselected">Imagens</button>
    </div>

    <div id="tabs">
        <section id="aba-dados">

            @if ($item->id_tp_produto != 1)

                <form action="/salvar/{{ $item->id }}" method="post" enctype="multipart/form-data" class="add-layout">
                    @csrf

                    <input type="hidden" name="id_produto" value="{{ $item->id_tp_produto }}">

                    <p for="" id="titulo-label" class="add-label">Título</p>
                    <input type="text" id="casa-titulo-input" name="titulo" class="add-input" value="{{ $item->titulo }}" required>

                    @if($item->id_tp_produto == 5)
                        <p for="" id="desc-label" class="add-label">Tipo de Comércio</p>
                        <input type="text" name="tipoComercio" class="add-input"  value="{{ $item->tipoComercio }}"required>
                        <!-- <select name="tipoComercio" id="tipoComercio" class="add-input">
                            <option value="Escritório" @if($item->tipoComercio == "Escritório") selected @endif>Escritório</option>
                            <option value="Salão" @if($item->tipoComercio == "Salão") selected @endif>Salão</option>
                            <option value="Loja em Shopping" @if($item->tipoComercio == "Loja em Shopping") selected @endif>Loja em Shopping</option>
                            <option value="Loja em centro comercial" @if($item->tipoComercio == "Loja em centro comercial") selected @endif>Loja em centro comercial</option>
                        </select> -->
                    @endif
                    <p for="" id="desc-label" class="add-label">Descrição</p>
                    <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input" required>{{ $item->desc }}</textarea>

                    <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros:</p>
                    <input type="number" name="qtd_banheiros" min="0" max="50" value="{{ $item->qtdBanheiros }}" id="sliderBanheiroCasa" class="add-input">

                    <p id="qtd-banheiros-label" class="slider-label">Quantidade de suites:</p>
                    <input type="number" name="qtd_suites" min="0" max="50" value="{{ $item->qtdSuites }}" id="sliderSuiteAp" class="add-input">

                    <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos:</p>
                    <input type="number" name="qtd_quartos" min="0" max="50" value="{{ $item->qtdQuartos }}" id="sliderQuartosCasa" class="add-input">

                    <p id="qtd-vagas-label" class="slider-label">Quantidade de Garagem com Cobertura:</p>
                    <input type="number" name="qtd_garagemCobertas" min="0" max="50" value="{{ $item->qtdGaragemCobertas }}" id="sliderVagasCasa" class="add-input">

                    <p id="qtd-vagas-label" class="slider-label">Quantidade de Garagem sem Cobertura:</p>
                    <input type="number" name="qtd_garagemNaoCobertas" min="0" max="50" value="{{ $item->qtdGaragemNaoCobertas }}" id="sliderVagasCasa" class="add-input">

                    <p id="qtd-vagas-label" class="slider-label">Quantidade de Sacadas:</p>
                    <input type="number" name="qtd_sacadasCobertas" min="0" max="50" value="{{ $item->qtdSacadasCobertas }}" id="sliderVagasCasa" class="add-input">

                    @if($item->id_tp_produto == 5)
                        <p id="qtd-vagas-label" class="slider-label">Quantidade de Elevadores:</p>
                        <input type="number" name="elevadores" min="0" max="50" value="{{ $item->elevadores }}" id="sliderVagasCasa" class="add-input">
                    @endif

                    <label class="add-label">Cidade</label>
                    <input type="text" name="cidade" id="localidade" value="{{ $item->cidade }}" class="add-input">

                    <label class="add-label">Bairro</label>
                    <input type="text" name="bairro" id="bairro" value="{{ $item->bairro }}" class="add-input">

                    <label class="add-label">Rua e Numero</label>
                    <input type="text" name="ruaNumero" id="bairro" value="{{ $item->ruaNumero }}" class="add-input">

                    <label class="add-label">CEP</label>
                    <input type="text" name="cep" id="bairro" value="{{ $item->cep }}" class="add-input">

                    <label class="add-label">Area</label>
                    <input type="text" name="area" id="area" value="{{ $item->area }}" class="add-input">

                    <p id="tam-area-label">Tamanho da área util (m<sup>2</sup>)</p>
                    <input name="areaUtil" type="text" id="casa-tam-area-input" value="{{ $item->areaUtil }}" class="add-input">

                    <p id="tam-area-label">Tamanho da área construida (m<sup>2</sup>)</p>
                    <input name="areaConstruida" type="text" id="casa-tam-area-input" value="{{ $item->areaConstruida }}" class="add-input">

                    <p id="tam-area-label">Tamanho da área do terreno (m<sup>2</sup>)</p>
                    <input name="areaTerreno" type="text" id="casa-tam-area-input" value="{{ $item->areaTerreno }}" class="add-input">

                    <label class="add-label">Valor</label>
                    <input type="text" name="valor" id="valor" value="{{ $item->valor }}" class="add-input input-format-edit">

                    <p id="valor-label">Valor condomínio</p>
                    <input type="text" name="valorCondominio" id="casa-valor-input" value="{{ $item->valorCondominio }}" class="add-input input-format-edit">

                    <p id="valor-label">IPTU mensal</p>
                    <input type="text" name="iptu" id="casa-valor-input" value="{{ $item->iptuMensal }}" class="add-input input-format-edit">

                    <p id="valor-label">Características do Imóvel</p>
                    <div class="checkbox">
                        @if($item->id_tp_produto != 5)
                        <div class="check-item">
                            <input type="checkbox" name="agua" id="agua" @if ($item->agua == 1) checked @endif><label>Agua</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="energia" id="energia" @if ($item->energia == 1) checked @endif><label>Energia</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="esgoto" id="esgoto" @if ($item->esgoto == 1) checked @endif><label>Esgoto</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="murado" id="murado" @if ($item->murado == 1) checked @endif><label>Murado</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="pavimentacao" id="pavimentacao" @if ($item->pavimentacao == 1) checked @endif><label>Pavimentação</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="areaServico" id="areaServico" @if ($item->areaServico == 1) checked @endif><label>Área de serviço</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="banheiroEmpregada" id="banheiroEmpregada" @if ($item->banheiroEmpregada == 1) checked @endif><label>Banheiro Empregada</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="cozinha" id="cozinha" @if ($item->cozinha == 1) checked @endif><label>Cozinha</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="cozinhaPlanejada" id="cozinhaPlanejada" @if ($item->cozinhaPlanejada == 1) checked @endif><label>Cozinha Planejada</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="despensa" id="despensa" @if ($item->despensa == 1) checked @endif><label>Despensa</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="lavanderias" id="lavanderias" @if ($item->lavanderias == 1) checked @endif><label>Lavanderia</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="guarita" id="guarita" @if ($item->guarita == 1) checked @endif><label>Guarita</label>
                        </div>
                        
                        <div class="check-item">
                            <input type="checkbox" name="areaLazer" id="areaLazer" @if ($item->areaLazer == 1) checked @endif><label>Área de lazer</label>
                        </div>
                        
                        <div class="check-item">
                            <input type="checkbox" name="playground" id="playground" @if ($item->playground == 1) checked @endif><label>Playground</label>
                        </div>
                        
                        <div class="check-item">
                            <input type="checkbox" name="varanda" id="varanda" @if ($item->varanda == 1) checked @endif><label>Varanda</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="varandaGourmet" id="varandaGourmet" @if ($item->varandaGourmet == 1) checked @endif><label>Varanda Gourmet</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="cozinhaConjugada" id="cozinhaConjugada" @if ($item->cozinhaConjugada == 1) checked @endif><label for="cozinhaConjugada">Cozinha conjugada</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="pisoFrio" id="pisoFrio" @if ($item->pisoFrio == 1) checked @endif><label>Piso Frio</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="porcelanato" id="porcelanato" @if ($item->porcelanato == 1) checked @endif><label>Porcelanato</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="lavado" id="lavado" @if ($item->lavado == 1) checked @endif><label>Lavado</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="roupeiro" id="roupeiro" @if ($item->roupeiro == 1) checked @endif><label>Roupeiro</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="suiteMaster" id="suiteMaster" @if ($item->suiteMaster == 1) checked @endif><label>Suite Master</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="closet" id="closet" @if ($item->closet == 1) checked @endif><label>Closet</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="entradaServico" id="entradaServico" @if ($item->entradaServico == 1) checked @endif><label>Entrada de serviço</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="escritorio" id="escritorio" @if ($item->escritorio == 1) checked @endif><label>Escritorio</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="jardim" id="jardim" @if ($item->jardim == 1) checked @endif><label>Jardim</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="moveisPlanejados" id="moveisPlanejados" @if ($item->moveisPlanejados == 1) checked @endif><label>Moveis planejados</label>
                        </div>
                        
                        <div class="check-item">
                            <input type="checkbox" name="porteiroEletronico" id="porteiroEletronico" @if ($item->porteiroEletronico == 1) checked @endif><label>Porteiro eletronico</label>
                        </div>
                        
                        <div class="check-item">
                            <input type="checkbox" name="areaLazer" id="areaLazer" @if ($item->areaLazer == 1) checked @endif><label for="areaLazer">Área de lazer</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="churrasqueira" id="churrasqueira" @if ($item->churrasqueira == 1) checked @endif><label for="churrasqueira">Churrasqueira</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="playground" id="playground" @if ($item->playground == 1) checked @endif><label for="playground">Playground</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="quadra" id="quadra" @if ($item->quadra == 1) checked @endif><label for="quadra">Quadra Esportiva</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="tvCabo" id="tvCabo" @if ($item->tvCabo == 1) checked @endif><label for="tvCabo">TV a Cabo</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="arCondicionado" id="arCondicionado" @if ($item->arCondicionado == 1) checked @endif><label for="arCondicionado">Ar Condicionado</label>
                        </div>

                        

                        <div class="check-item">
                            <input type="checkbox" name="aguaSolar" id="aguaSolar" @if ($item->aguaSolar == 1) checked @endif><label for="aguaSolar">Agua Aquecida por Energia Solar</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="mobiliado" id="mobiliado" @if ($item->mobiliado == 1) checked @endif><label for="mobiliado">Mobiliado</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="depEmpregados" id="depEmpregados" @if ($item->depEmpregados == 1) checked @endif><label for="depEmpregados">Dep. Empregados</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="lareira" id="lareira" @if ($item->lareira == 1) checked @endif><label for="lareira">Lareira</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="caseiro" id="caseiro" @if ($item->caseiro == 1) checked @endif><label for="caseiro">Caseiro</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="edicula" id="edicula" @if ($item->edicula == 1) checked @endif><label for="edicula">Edícula</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="piscinaCondominio" id="piscinaCondominio" @if ($item->piscinaCondominio == 1) checked @endif><label for="piscinaCondominio">Piscina Condomínio</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="terraco" id="terraco" @if ($item->terraco == 1) checked @endif><label for="terraco">Terraço</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="hidromassagem" id="hidromassagem" @if ($item->hidromassagem == 1) checked @endif><label for="hidromassagem">Hidromassagem</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="jardimInverno" id="jardimInverno" @if ($item->jardimInverno == 1) checked @endif><label for="jardimInverno">Jardim de Inverno</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoAquecido" id="pisoAquecido" @if ($item->pisoAquecido == 1) checked @endif><label for="pisoAquecido">Piso Aquecido</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoArdosia" id="pisoArdosia" @if ($item->pisoArdosia == 1) checked @endif><label for="pisoArdosia">Piso Ardosia</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoBioquete" id="pisoBioquete" @if ($item->pisoBioquete == 1) checked @endif><label for="pisoBioquete">Piso Bioquete</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoCarpete" id="pisoCarpete" @if ($item->pisoCarpete == 1) checked @endif><label for="pisoCarpete">Piso Carpete</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoCeramica" id="pisoCeramica" @if ($item->pisoCeramica == 1) checked @endif><label for="pisoCeramica">Piso cerâmica</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoCimentoQueimado" id="pisoCimentoQueimado" @if ($item->pisoCimentoQueimado == 1) checked @endif><label for="pisoCimentoQueimado">Piso Cimento Queimado</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoEmborrachado" id="pisoEmborrachado" @if ($item->pisoEmborrachado == 1) checked @endif><label for="pisoEmborrachado">Piso Emborrachado</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoTacoMadeira" id="pisoTacoMadeira" @if ($item->pisoTacoMadeira == 1) checked @endif><label for="pisoTacoMadeira">Piso de Taco de Madeira</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="contraPiso" id="contraPiso" @if ($item->contraPiso == 1) checked @endif><label for="contraPiso">Contra Piso</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="pisoTabua" id="pisoTabua" @if ($item->pisoTabua == 1) checked @endif><label for="pisoTabua">Piso de Tábua</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="granito" id="granito" @if ($item->granito == 1) checked @endif><label for="granito">Granito</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="marmore" id="marmore" @if ($item->marmore == 1) checked @endif><label for="marmore">Mármore</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioCozinha" id="armarioCozinha" @if ($item->armarioCozinha == 1) checked @endif><label for="armarioCozinha">Armário Cozinha</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioCorredor" id="armarioCorredor" @if ($item->armarioCorredor == 1) checked @endif><label for="armarioCorredor">Armário Corredor</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioCloset" id="armarioCloset" @if ($item->armarioCloset == 1) checked @endif><label for="armarioCloset">Armário Closet</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioQuarto" id="armarioQuarto" @if ($item->armarioQuarto == 1) checked @endif><label for="armarioQuarto">Armário Quarto</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioBanheiro" id="armarioBanheiro" @if ($item->armarioBanheiro == 1) checked @endif><label for="armarioBanheiro">Armário Banheiro</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioSala" id="armarioSala" @if ($item->armarioSala == 1) checked @endif><label for="armarioSala">Armário Sala</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioEscritorio" id="armarioEscritorio" @if ($item->armarioEscritorio == 1) checked @endif><label for="armarioEscritorio">Armário Escritório</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioDepEmp" id="armarioDepEmp" @if ($item->armarioDepEmp == 1) checked @endif><label for="armarioDepEmp">Armário Dep. Empregado</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="armarioAreaServico" id="armarioAreaServico" @if ($item->armarioAreaServico == 1) checked @endif><label for="armarioAreaServico">Armário Área de Serviço</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="salaCinema" id="salaCinema" @if ($item->salaCinema == 1) checked @endif><label for="salaCinema">Sala de Cinema</label>
                        </div>


                        @endif

                        <!-- Ponto comercial -->
                        @if($item->id_tp_produto == 5)
                        <div class="check-item">
                            <input type="checkbox" name="copa" id="copa" @if ($item->copa == 1) checked @endif><label>Copa</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="recepcao" id="recepcao" @if ($item->recepcao == 1) checked @endif><label>Recepção</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="mesanino" id="mesanino" @if ($item->mesanino == 1) checked @endif><label>Mezanimo</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="luminarias" id="luminarias" @if ($item->luminarias == 1) checked @endif><label>Luminarias</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="acessoDeficiente" id="acessoDeficiente" @if ($item->acessoDeficiente == 1) checked @endif><label>Acesso para Deficiente</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="geradorEnergia" id="geradorEnergia" @if ($item->geradorEnergia == 1) checked @endif><label>Gerador de Energia</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="telefonia" id="telefonia" @if ($item->telefonia == 1) checked @endif><label>Telefonia</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="rede" id="rede" @if ($item->rede == 1) checked @endif><label>Rede de Internet</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="cozinha" id="cozinha" @if ($item->cozinha == 1) checked @endif><label>Cozinha</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="portaria24" id="portaria24" @if ($item->portaria24h == 1) checked @endif><label>Portaria 24h</label>
                        </div>  
                        <div class="check-item">
                            <input type="checkbox" name="arCondicionado" id="arCondicionado" @if ($item->arCondicionado == 1) checked @endif><label for="arCondicionado">Ar Condicionado</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="alarme" id="alarme" @if ($item->alarme == 1) checked @endif><label for="alarme">Alarme</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="sistemaIncendio" id="sistemaIncendio" @if ($item->sistemaIncendio == 1) checked @endif><label for="sistemaIncendio">Sistema de Incêndio</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="aquecimentoCentral" id="aquecimentoCentral" @if ($item->aquecimentoCentral == 1) checked @endif><label for="aquecimentoCentral">Aquecimento Central</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="vigilancia24h" id="vigilancia24h" @if ($item->vigilancia24h == 1) checked @endif><label for="vigilancia24h">Vigilância 24h</label>
                        </div>
                        
                        @endif
                    </div>

                    <p id="valor-label">Características da Área Comum</p>
                    <div class="checkbox">
                        <div class="check-item">
                            <input type="checkbox" name="churrasqueira" id="churrasqueira" @if ($item->churrasqueira == 1) checked @endif><label>Churrasqueira</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="vestiario" id="vestiario" @if ($item->vestiario == 1) checked @endif><label for="vestiario" >Vestiário</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="adega" id="adega" @if ($item->adega == 1) checked @endif><label for="adega">Adega</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="sauna" id="sauna" @if ($item->sauna == 1) checked @endif><label for="sauna">Sauna</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="campFut" id="campFut" @if ($item->campFut == 1) checked @endif><label for="campFut">Campo de Futebol</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="salaJogos" id="salaJogos" @if ($item->salaJogos == 1) checked @endif><label for="salaJogos">Sala de Jogos</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="salaFestas" id="salaFestas" @if ($item->salaFestas == 1) checked @endif><label for="salaFestas">Salão de Festas</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="salaGinastica" id="salaGinastica" @if ($item->salaGinastica == 1) checked @endif><label for="salaGinastica">Sala de Ginástica</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="estacionamentoVisita" id="estacionamentoVisita" @if ($item->estacionamentoVisita == 1) checked @endif><label for="estacionamentoVisita">Estacionamento para Visita</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="quadra" id="quadra" @if ($item->quadra == 1) checked @endif><label>Quadra esportiva</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="quintal" id="quintal" @if ($item->quintal == 1) checked @endif><label>Quintal</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="piscina" id="piscina" @if ($item->piscina == 1) checked @endif><label for="piscina">Piscina</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="playground" id="playground" @if ($item->playground == 1) checked @endif><label>Playground</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="portaria24" id="portaria24" @if ($item->portaria24h == 1) checked @endif><label>Portaria 24h</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="estacionamentoVisita" id="estacionamentoVisita" @if ($item->estacionamentoVisita == 1) checked @endif><label for="estacionamentoVisita">Estacionamento para Visita</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="portaoEletronico" id="portaoEletronico" @if ($item->portaoEletronico == 1) checked @endif><label>Portão eletronico</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="alarme" id="alarme" @if ($item->alarme == 1) checked @endif><label for="alarme">Alarme</label>
                        </div>
                    </div>

                    <p id="local-label">Informações extras (separar por ponto e vírgula)</p>
                    <input name="extraInfo" type="text" id="casa-local-input" class="add-input" maxlength="3000" value="{{ $item->extraInfo }}">

                    <label class="add-label">Inserir novas Imagens</label>
                    <input type="file" name="imagem[]" id="imagemEdit" multiple>

                    <input type="file" name="imagemEditPrincipal" id="imagemEditPrincipal" style="display: none">

                    <div id="imagemPreviewEdit"></div>

                    <button type="submit" id="salvar">Salvar</button>
                </form>
            @else
            <form action="/salvar/{{ $item->id }}" method="post" enctype="multipart/form-data" class="add-layout">
                @csrf

                <input type="hidden" name="id_produto" value="{{ $item->id_tp_produto }}">

                <p for="" id="titulo-label" class="add-label">Título</p>
                <input type="text" id="casa-titulo-input" name="titulo" class="add-input" value="{{ $item->titulo }}" required>

                <p for="" id="desc-label" class="add-label">Descrição</p>

                <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input" required>{{ $item->desc }}</textarea>

                <label class="add-label">Cidade</label>
                <input type="text" name="cidade" id="localidade" value="{{ $item->cidade }}" class="add-input">

                <label class="add-label">Bairro</label>
                <input type="text" name="bairro" id="bairro" value="{{ $item->bairro }}" class="add-input">

                <label class="add-label">Rua e Numero</label>
                <input type="text" name="ruaNumero" id="bairro" value="{{ $item->ruaNumero }}" class="add-input">

                <label class="add-label">CEP</label>
                <input type="text" name="cep" id="bairro" value="{{ $item->cep }}" class="add-input">

                <label class="add-label">Area</label>
                <input type="text" name="area" id="area" value="{{ $item->area }}" class="add-input">

                <label class="add-label">Valor</label>
                <input type="text" name="valor" id="valor" value="{{ $item->valor }}" class="add-input input-format-edit">

                <p id="valor-label">Valor condomínio</p>
                <input type="text" name="valorCondominio" id="casa-valor-input" value="{{ $item->valorCondominio }}" class="add-input input-format-edit">

                <p id="valor-label">IPTU mensal</p>
                <input type="text" name="iptu" id="casa-valor-input" value="{{ $item->iptuMensal }}" class="add-input input-format-edit">
                <p id="tam-area-label">Metragem da Frente</p>
                <input name="metragemFrente" type="text" id="trn-tam-area-input" value="{{ $item->metragemFrente }}" min="1" class="add-input input-format" required>

                <p id="tam-area-label">Metragem Lateral</p>
                <input name="metragemFundo" type="text" id="trn-tam-area-input" value="{{ $item->metragemFundo }}" min="1" class="add-input input-format" required>

                <p id="tam-area-label">Lateral Esquerda</p>
                <input name="metragemDireita" type="text" id="trn-tam-area-input" value="{{ $item->metragemEsquerda }}" min="1" class="add-input input-format" required>

                <p id="tam-area-label">Lateral Direita</p>
                <input name="metragemEsquerda" type="text" id="trn-tam-area-input" value="{{ $item->metragemDireita }}" min="1" class="add-input input-format" required>

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

                <p id="valor-label">Características do Terreno</p>
                    <div class="checkbox">
                        <div class="check-item">
                            <input type="checkbox" name="acessoEnergia" id="acessoEnergia" @if ($item->acessoEnergia == 1) checked @endif><label>Acesso a Energia Elétrica</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="escola" id="escola" @if ($item->escola == 1) checked @endif><label>Escola</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="comercio" id="comercio" @if ($item->comercio == 1) checked @endif><label>Comércio</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="aguaEncanada" id="aguaEncanada" @if ($item->aguaEncanada == 1) checked @endif><label>Água encanada</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="sistemaEsgoto" id="sistemaEsgoto" @if ($item->sistemaEsgoto == 1) checked @endif><label>Sistema de esgoto</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="pavimentacao" id="pavimentacao" @if ($item->pavimentacao == 1) checked @endif><label>Pavimentação</label>
                        </div>
                    </div>
                    <p id="valor-label">Infraestrutura do Condomínio</p>
                    <div class="checkbox">
                        <div class="check-item">
                            <input type="checkbox" name="churrasqueira" id="churrasqueira" @if ($item->churrasqueira == 1) checked @endif><label>Churrasqueira</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="vestiário" id="vestiário"><label for="vestiário">Vestiário</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="adega" id="adega" @if ($item->adega == 1) checked @endif><label for="adega">Adega</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="sauna" id="sauna" @if ($item->sauna == 1) checked @endif><label for="sauna">Sauna</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="campFut" id="campFut" @if ($item->campFut == 1) checked @endif><label for="campFut">Campo de Futebol</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="salaJogos" id="salaJogos" @if ($item->salaJogos == 1) checked @endif><label for="salaJogos">Sala de Jogos</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="salaFestas" id="salaFestas" @if ($item->salaFestas == 1) checked @endif><label for="salaFestas">Salão de Festas</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="salaGinastica" id="salaGinastica" @if ($item->salaGinastica == 1) checked @endif><label for="salaGinastica">Sala de Ginástica</label>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" name="estacionamentoVisita" id="estacionamentoVisita" @if ($item->estacionamentoVisita == 1) checked @endif><label for="estacionamentoVisita">Estacionamento para Visita</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="quadra" id="quadra" @if ($item->quadra == 1) checked @endif><label>Quadra esportiva</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="quintal" id="quintal" @if ($item->quintal == 1) checked @endif><label>Quintal</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="piscina" id="piscina" @if ($item->piscina == 1) checked @endif><label for="piscina">Piscina</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="playground" id="playground" @if ($item->playground == 1) checked @endif><label>Playground</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="portaria24" id="portaria24" @if ($item->portaria24h == 1) checked @endif><label>Portaria 24h</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="estacionamentoVisita" id="estacionamentoVisita" @if ($item->estacionamentoVisita == 1) checked @endif><label for="estacionamentoVisita">Estacionamento para Visita</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="portaoEletronico" id="portaoEletronico" @if ($item->portaoEletronico == 1) checked @endif><label>Portão eletronico</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="alarme" id="alarme" @if ($item->alarme == 1) checked @endif><label for="alarme">Alarme</label>
                        </div>
                    </div>

                <label class="add-label">Inserir novas Imagens</label>
                <input type="file" name="imagem[]" id="imagemEdit" multiple>

                <input type="file" name="imagemEditPrincipal" id="imagemEditPrincipal" style="display: none">

                <div id="imagemPreviewEdit"></div>

                <button type="submit" id="salvar">Salvar</button>
            </form>
            @endif
        </section>

        <section id="aba-imagens">

            <p class="img-title-label">Imagem Principal</p>
            <div class="div-center">
                <div id="main-img" style="background-image: url('{{ asset($imagemPrincipal->path) }}')"></div>
            </div>

            <hr class="tab-divider">

            <p class="img-title-label">Imagens</p>

            <div class="image-list-container">
                <div class="image-flex">
                    @foreach ($imagem as $img)
                        @if ($item->id == $img->chave)
                            <div class="image-list-content">
                                <div class="edit-img-frame" style="background-image: url('{{ asset($img->path) }}')"></div>
                                <input type="hidden" name="id" value="{{ $img->id }}">

                                <div class="image-list-buttons">
                                    <button id="bntTrocarPrincipal" class="image-list-button" onclick="trocarPrincipal(this)">Trocar</button>
                                    <button id="imovel-remover" onclick="excluirImg(this);" class="image-list-button">Excluir</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>


            @if(session('excluir'))
                <div class="alert alert-success flash-message">
                    {{ session('excluir') }}
                </div>
            @endif

        </section>

    </div>

</div>



</body>
</html>

<!-- Sistema de abas -->
<script>
    //sistema de abas
    const abas = [
        document.getElementById('aba-dados'),
        document.getElementById('aba-imagens')
    ]
    const botoes = document.getElementsByClassName('tab-button')


    openTab(0,'block')

    function clearAll() {
        for(let i=0; i<abas.length; i++)  {
            abas[i].style.display = "none"
        }
    }

    function openTab(index, displayType) {
        clearAll()
        selectTab(index)
        abas[index].style.display = displayType
    }

    //efeito visual na aba
    function selectTab(index) {
        unselectAll()

        botoes[index].classList.replace('tab-unselected','tab-selected')
    }
    function unselectAll() {

        for(i=0; i<botoes.length; i++) {
            botoes[i].classList.replace('tab-selected','tab-unselected')
        }
    }
</script>

<!-- Formatação numérica -->
<script>
    const forms = document.getElementsByClassName('add-layout')
    const inputs = document.getElementsByClassName('input-format-edit')


    for(let item of forms) {
        item.addEventListener('submit', function(event) {
            // Impede o envio padrão do formulário
            event.preventDefault();
    
            // Chame a função antesDoEnvio() e envie o formulário apenas se a função retornar true
            if (formatNum()) {
                this.submit(); // Isso envia o formulário
            }
        })
    }

    function formatNum() {
        for(let item of inputs) {
            item.value = item.value.replace(',','.')
        }
        return true
    }

</script>