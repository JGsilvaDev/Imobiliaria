<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/listar-produtos.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&display=swap" rel="stylesheet">
    <title>Listando Imoveis</title>
</head>
<body>
    <h1>Todos os imoveis</h1>

    <div id="pagina">
        <form action="imoveis" method="post" id="painel-pesquisa-lateral" class="search-hidden">
            @csrf
            <div id="painel-pesquisa-opcoes-lateral">
                <p>Título do imóvel:</p>

                <input type="text" name="titulo" class="input-text" id="painel-titulo-lateral" placeholder="Pesquisar imóvel">
                <p>Localidade:</p>
                <input type="text" name="localidade" id="painel-local-lateral" class="input-text" placeholder="Pesquisar Localidade">
                <p>Quantidade de quartos:</p>
                <div class="radio-options-lateral">
                    <div class="radio-option-lateral">
                        <input type="radio" name="qtdQuartos" id=""> <label for="">1</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="qtdQuartos" id=""> <label for="">2</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="qtdQuartos" id=""> <label for="">3+</label>
                    </div>
                </div>
                <p>Quantidade de banheiros:</p>
                <div class="radio-options-lateral">
                    <div class="radio-option-lateral">
                        <input type="radio" name="qtdBanheiros" id=""> <label for="">1</label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="qtdBanheiros" id=""> <label for="">2</label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="qtdBanheiros" id=""> <label for="">3+</label>
                    </div>
                </div>
                <p>Quantidade de vagas:</p>
                <div class="radio-options-lateral">
                    <div class="radio-option-lateral">
                        <input type="radio" name="qtdVagas" id=""> <label for="">1</label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="qtdVagas" id=""> <label for="">2</label>

                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="qtdVagas" id=""> <label for="">3+</label>
                    </div>
                </div>
                <p>Valor:</p>
                <div class="radio-options-lateral">
                    <div class="radio-option-lateral">
                        <input type="radio" name="valor" id=""> <label for="">Até R$100.000</label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="valor" id=""> <label for="">Entre R$100.000 e R$300.000</label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="valor" id=""> <label for="">Mais que R$300.000</label>
                    </div>
                </div>
                <p>Area:</p>
                <div class="radio-options-lateral">
                    <div class="radio-option-lateral">
                        <input type="radio" name="area" id=""> <label for="">Até 150m<sup>2</sup></label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="area" id=""> <label for="">Entre 150m<sup>2</sup> e 250m<sup>2</sup></label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="area" id=""> <label for="">Mais que 250m<sup>2</sup></label>
                    </div>
                </div>
                <div id="button-buscar-container">
                    <button type="submit" class="busca-painel-btn">Procurar</button>
                </div>
            </div>
        </form>

        <div id="painel-pesquisa-float">
            <div id="painel-pesquisa-titulo">
                <h1>Pesquisa avançada</h1>
            </div>
            <form action="imoveis" method="post" id="painel-pesquisa-opcoes">
                @csrf
                <p>Título do imóvel</p>
                <input type="text" name="titulo" class="input-text" id="painel-titulo" placeholder="Pesquisar imóvel">
                <p>Localidade</p>
                <input type="text" name="localidade" id="painel-local" class="input-text">
                <p>Quantidade de quartos</p>
                <div class="radio-options">
                    <div class="radio-option">
                        <input type="radio" name="qtdQuartos" id="" value="1"> <label for="">1</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="qtdQuartos" id="" value="2"> <label for="">2</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="qtdQuartos" id="" value="3"> <label for="">3+</label>
                    </div>
                </div>
                <p>Quantidade de banheiros</p>
                <div class="radio-options">
                    <div class="radio-option">
                        <input type="radio" name="qtdBanheiros" id="" value="1"> <label for="">1</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="qtdBanheiros" id="" value="2"> <label for="">2</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="qtdBanheiros" id="" value="3"> <label for="">3+</label>
                    </div>
                </div>
                <p>Quantidade de vagas</p>
                <div class="radio-options">
                    <div class="radio-option">
                        <input type="radio" name="vagas" id="" value="1"> <label for="">1</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="vagas" id="" value="2"> <label for="">2</label>

                    </div>
                    <div class="radio-option">
                        <input type="radio" name="vagas" id="" value="3"> <label for="">3+</label>
                    </div>
                </div>
                <p>Valor</p>
                <div class="radio-options-column">
                    <div class="radio-option">
                        <input type="radio" name="valor" id="" value="1"> <label for="">Até R$100.000</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="valor" id="" value="2"> <label for="">Entre R$100.000 e R$300.000</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="valor" id="" value="3"> <label for="">Mais que R$300.000</label>
                    </div>
                </div>
                <p>Area</p>
                <div class="radio-options-column">
                    <div class="radio-option">
                        <input type="radio" name="area" id="" value="1"> <label for="">Até 150m<sup>2</sup></label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="area" id="" value="2"> <label for="">Entre 150m<sup>2</sup> e 250m<sup>2</sup></label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="area" id="" value="3"> <label for="">Mais que 250m<sup>2</sup></label>
                    </div>
                </div>
                <button type="submit" class="busca-painel-btn">Procurar</button>
            </form>
        </div>

        @foreach ($imoveis as $item)
            @if($item->id != 0)
                <div id="lista-produtos">
                    <div class="produto-container">
                        <div class="produto-imagem">
                            @foreach ($imagens as $path)
                                @if($item->id == $path->chave)
                                        <img src="{{asset($path->path)}}" alt="Imagem">
                                        @break
                                    @endif
                            @endforeach
                        </div>
                        <p class="produto-titulo">{{ $item->titulo }}</p>
                        <p class="produto-descricao">{{ $item->descricao }}</p>
                        <div class="produto-dados">
                            <p class="produto-valor">{{ $item->valor }}</p>
                            <p class="produto-vagas">{{ $item->qtdQuartos }}quartos, {{ $item->qtdBanheiros }}banheiros e {{ $item->qtdVagas }} vagas</p>
                        </div>
                        <form action="/imoveis/{{ $item->id }}" method="post">
                            @csrf
                            <input type="hidden" name="idImovel">
                            <button class="produto-saber-mais" type="submit">Detalhe</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-success flash-message">
                    <p>Nenhum item encontrado com esse titulo</p>
                </div>
            @endif
        @endforeach
    </div>
    <img src="{{ asset('img/pesquisa.svg') }}" alt="" id="mobile-buscar" onclick="abrirPainel()">
    <script src="{{ asset('js/mostrarPainel.js') }}"></script>
</body>
</html>
