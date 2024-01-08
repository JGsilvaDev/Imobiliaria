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

                    <p for="" id="desc-label" class="add-label">Descrição</p>

                    <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input" required>{{ $item->desc }}</textarea>

                    <p id="qtd-banheiros-label" class="slider-label">Quantidade de banheiros: <span id="sliderValueBanheiroCasa">{{ $item->qtdBanheiros }}</span></p>
                    <input type="range" name="qtd_banheiros" min="0" max="50" value="{{ $item->qtdBanheiros }}" id="sliderBanheiroCasa" class="slider">

                    <p id="qtd-banheiros-label" class="slider-label">Quantidade de suites: <span id="sliderValueSuiteAp">{{ $item->qtdSuites }}</span></p>
                    <input type="range" name="qtd_suites" min="0" max="50" value="{{ $item->qtdSuites }}" id="sliderSuiteAp" class="slider">

                    <p id="qtd-quartos-label" class="slider-label">Quantidade de quartos: <span id="sliderValueQuartosCasa">{{ $item->qtdQuartos }}</span></p>
                    <input type="range" name="qtd_quartos" min="0" max="50" value="{{ $item->qtdQuartos }}" id="sliderQuartosCasa" class="slider">

                    <p id="qtd-vagas-label" class="slider-label">Quantidade de Garagem com Cobertura: <span id="sliderValueVagasCasa">{{ $item->qtdGaragemCobertas }}</span></p>
                    <input type="range" name="qtd_vagas" min="0" max="50" value="{{ $item->qtdGaragemCobertas }}" id="sliderVagasCasa" class="slider">

                    <p id="qtd-vagas-label" class="slider-label">Quantidade de Garagem sem Cobertura: <span id="sliderValueVagasCasa">{{ $item->qtdGaragemNaoCobertas }}</span></p>
                    <input type="range" name="qtd_vagas" min="0" max="50" value="{{ $item->qtdGaragemNaoCobertas }}" id="sliderVagasCasa" class="slider">

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
                    <input name="areaUtil" type="number" id="casa-tam-area-input" value="{{ $item->areaUtil }}" class="add-input">

                    <p id="tam-area-label">Tamanho da área contruida (m<sup>2</sup>)</p>
                    <input name="areaConstruida" type="number" id="casa-tam-area-input" value="{{ $item->areaConstruida }}" class="add-input">

                    <p id="tam-area-label">Tamanho da área do terreno (m<sup>2</sup>)</p>
                    <input name="areaTerreno" type="number" id="casa-tam-area-input" value="{{ $item->areaTerreno }}" class="add-input">

                    <label class="add-label">Valor</label>
                    <input type="text" name="valor" id="valor" value="{{ $item->valor }}" class="add-input">

                    <p id="valor-label">Valor condominio</p>
                    <input type="number" name="valorCondominio" id="casa-valor-input" value="{{ $item->valorCondominio }}" class="add-input">

                    <p id="valor-label">IPTU mensal</p>
                    <input type="number" name="iptu" id="casa-valor-input" value="{{ $item->iptuMensal }}" class="add-input">

                    <p id="valor-label">Básico</p>
                    <div class="checkbox">
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
                            <input type="checkbox" name="pavimentação" id="pavimentação" @if ($item->pavimentação == 1) checked @endif><label>Pavimentação</label>
                        </div>
                    </div>

                    <p id="valor-label">Serviços</p>
                    <div class="checkbox">
                        <div class="check-item">
                            <input type="checkbox" name="areaServico" id="areaServico" @if ($item->areaServico == 1) checked @endif><label>Área de serviço</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="banheiroAux" id="banheiroAux" @if ($item->banheiroAuxiliar == 1) checked @endif><label>Banheiro Auxiliar</label>
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
                            <input type="checkbox" name="portaria24" id="portaria24" @if ($item->portaria24h == 1) checked @endif><label>Portaria 24h</label>
                        </div>
                    </div>

                    <p id="valor-label">Lazer</p>
                    <div class="checkbox">
                        <div class="check-item">
                            <input type="checkbox" name="areaLazer" id="areaLazer" @if ($item->areaLazer == 1) checked @endif><label>Área de lazer</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="churrasqueira" id="churrasqueira" @if ($item->churrasqueira == 1) checked @endif><label>Churrasqueira</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="playground" id="playground" @if ($item->playground == 1) checked @endif><label>Playground</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="quadra" id="quadra" @if ($item->quadra == 1) checked @endif><label>Quadra esportiva</label>
                        </div>
                    </div>

                    <p id="valor-label">Social</p>
                    <div class="checkbox">
                        <div class="check-item">
                            <input type="checkbox" name="varanda" id="varanda" @if ($item->varanda == 1) checked @endif><label>Varanda</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="varandaGourmet" id="varandaGourmet" @if ($item->varandaGourmet == 1) checked @endif><label>Varanda Gourmet</label>
                        </div>
                    </div>

                    <p id="valor-label">Acabamento</p>
                    <div class="checkbox">
                        <div class="check-item">
                            <input type="checkbox" name="pisoFrio" id="pisoFrio" @if ($item->pisoFrio == 1) checked @endif><label>Piso Frio</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="porcelanato" id="porcelanato" @if ($item->porcelanato == 1) checked @endif><label>Porcelanato</label>
                        </div>
                    </div>

                    <p id="valor-label">Intima</p>
                    <div class="checkbox">
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
                    </div>

                    <p id="valor-label">Destaques</p>
                    <div class="checkbox">
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
                            <input type="checkbox" name="portaoEletronico" id="portaoEletronico" @if ($item->portaoEletronico == 1) checked @endif><label>Portão eletronico</label>
                        </div>
                        <div class="check-item">
                            <input type="checkbox" name="quintal" id="quintal" @if ($item->quintal == 1) checked @endif><label>Quintal</label>
                        </div>
                    </div>

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
                <input type="text" name="valor" id="valor" value="{{ $item->valor }}" class="add-input">

                <p id="valor-label">Valor condominio</p>
                <input type="number" name="valorCondominio" id="casa-valor-input" value="{{ $item->valorCondominio }}" class="add-input">

                <p id="valor-label">IPTU mensal</p>
                <input type="number" name="iptu" id="casa-valor-input" value="{{ $item->iptuMensal }}" class="add-input">

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
