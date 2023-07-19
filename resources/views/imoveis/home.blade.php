@extends('layouts.layout_navbar')

@section('title', 'Todos Produtos')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/listar-produtos.css') }}">

    <div id="pagina">
        <form action="imoveis" method="post" id="painel-pesquisa-lateral" class="search-hidden">
            @csrf
            <div id="painel-pesquisa-opcoes-lateral">
                <p>Título do imóvel:</p>
                <input type="text" name="titulo" class="input-text" id="painel-titulo-lateral"
                    placeholder="Pesquisar imóvel">
                <p>Localidade:</p>
                <input type="text" name="localidade" id="painel-local-lateral" class="input-text"
                    placeholder="Pesquisar Localidade">
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
                        <input type="radio" name="valor" id=""> <label for="">Entre R$100.000 e
                            R$300.000</label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="valor" id=""> <label for="">Mais que
                            R$300.000</label>
                    </div>
                </div>
                <p>Area:</p>
                <div class="radio-options-lateral">
                    <div class="radio-option-lateral">
                        <input type="radio" name="area" id=""> <label for="">Até
                            150m<sup>2</sup></label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="area" id=""> <label for="">Entre 150m<sup>2</sup> e
                            250m<sup>2</sup></label>
                    </div>
                    <div class="radio-option-lateral">
                        <input type="radio" name="area" id=""> <label for="">Mais que
                            250m<sup>2</sup></label>
                    </div>
                </div>
                <div id="button-buscar-container">
                    <button type="submit" class="busca-painel-btn">Procurar</button>
                </div>
            </div>
        </form>

        @if (session('search') != 'sem filtro' and session('search') != null)
            <div id="painel-pesquisa-float">
                <div id="painel-pesquisa-titulo">
                    <h1>Pesquisa avançada</h1>
                </div>
                <form action="imoveis" method="post" id="painel-pesquisa-opcoes">
                    @csrf
                    <p>Título do imóvel</p>
                    <input type="text" name="titulo" class="input-text" id="painel-titulo"
                        placeholder="Pesquisar imóvel" value="{{ session('search')[0]->titulo }}">
                    <p>Localidade</p>
                    <input type="text" name="localidade" id="painel-local" class="input-text"
                        value="{{ session('search')[0]->localidade }}">
                    <p>Quantidade de quartos</p>
                    <div class="radio-options">
                        @if(session('search')[0]->quartos == 1 )
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="1" checked> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="2"> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="3"> <label
                                    for="">3+</label>
                            </div>

                        @elseif(session('search')[0]->quartos == 2 )
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="2"  checked> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="3"> <label
                                    for="">3+</label>
                            </div>

                        @elseif(session('search')[0]->quartos == 3)
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="2"> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="3" checked> <label
                                    for="">3+</label>
                            </div>

                        @else
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="2"> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        @endif
                    </div>
                    <p>Quantidade de banheiros</p>
                    <div class="radio-options">
                        @if(session('search')[0]->banheiros == 1)
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="1" checked> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="2"> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        @elseif(session('search')[0]->banheiros == 2)
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="2" checked> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        @elseif(session('search')[0]->banheiros == 3)
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="2"> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="3" checked> <label
                                    for="">3+</label>
                            </div>
                        @else
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="2"> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        @endif
                    </div>
                    <p>Quantidade de vagas</p>
                    <div class="radio-options">
                        @if(session('search')[0]->vagas == 1)
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="1" checked> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="2"> <label
                                    for="">2</label>

                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        @elseif(session('search')[0]->vagas == 2)
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="2" checked> <label
                                    for="">2</label>

                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        @elseif(session('search')[0]->vagas == 3)
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="2"> <label
                                    for="">2</label>

                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="3" checked> <label
                                    for="">3+</label>
                            </div>
                        @else
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="2"> <label
                                    for="">2</label>

                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        @endif
                    </div>
                    <p>Valor</p>
                    <div class="radio-options-column">
                        @if(session('search')[0]->valor == 1)
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="1" checked> <label
                                    for="">Até
                                    R$100.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="2"> <label
                                    for="">Entre
                                    R$100.000 e R$300.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="3"> <label
                                    for="">Mais
                                    que R$300.000</label>
                            </div>
                        @elseif(session('search')[0]->valor == 2)
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="1"> <label
                                    for="">Até
                                    R$100.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="2" checked> <label
                                    for="">Entre
                                    R$100.000 e R$300.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="3"> <label
                                    for="">Mais
                                    que R$300.000</label>
                            </div>
                        @elseif(session('search')[0]->valor == 3)
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="1"> <label
                                    for="">Até
                                    R$100.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="2"> <label
                                    for="">Entre
                                    R$100.000 e R$300.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="3" checked> <label
                                    for="">Mais
                                    que R$300.000</label>
                            </div>
                        @else
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="1"> <label
                                    for="">Até
                                    R$100.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="2"> <label
                                    for="">Entre
                                    R$100.000 e R$300.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="3"> <label
                                    for="">Mais
                                    que R$300.000</label>
                            </div>
                        @endif
                    </div>
                    <p>Area</p>
                    @if(session('search')[0]->area == 1)
                        <div class="radio-options-column">
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="1" checked> <label
                                    for="">Até
                                    150m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="2"> <label
                                    for="">Entre
                                    150m<sup>2</sup> e 250m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="3"> <label
                                    for="">Mais
                                    que 250m<sup>2</sup></label>
                            </div>
                        </div>
                    @elseif(session('search')[0]->area == 2)
                        <div class="radio-options-column">
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="1"> <label
                                    for="">Até
                                    150m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="2" checked> <label
                                    for="">Entre
                                    150m<sup>2</sup> e 250m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="3"> <label
                                    for="">Mais
                                    que 250m<sup>2</sup></label>
                            </div>
                        </div>
                    @elseif(session('search')[0]->area == 3)
                        <div class="radio-options-column">
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="1"> <label
                                    for="">Até
                                    150m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="2"> <label
                                    for="">Entre
                                    150m<sup>2</sup> e 250m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="3" checked> <label
                                    for="">Mais
                                    que 250m<sup>2</sup></label>
                            </div>
                        </div>
                    @else
                        <div class="radio-options-column">
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="1"> <label
                                    for="">Até
                                    150m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="2"> <label
                                    for="">Entre
                                    150m<sup>2</sup> e 250m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="3"> <label
                                    for="">Mais
                                    que 250m<sup>2</sup></label>
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="busca-painel-btn">Procurar</button>
                </form>
            </div>

        
            @else
            <div id="painel-pesquisa-float-completo">
                <div id="painel-pesquisa-titulo">
                    <h1>Pesquisa avançada</h1>
                </div>

                <div id="painel-pesquisa-float">
                    <form action="imoveis" method="post" id="painel-pesquisa-opcoes">
                        @csrf
                        <div class="input-search-group">
                            <p>Título do imóvel</p>
                            <input type="text" name="titulo" class="input-text" id="painel-titulo" placeholder="Pesquisar imóvel">
                            <p id="localidade-titulo">Localidade</p>
                            <input type="text" name="localidade" id="painel-local" class="input-text" placeholder="localidade">
                        </div>

                        <p class="search-title input-title ">Quantidade de quartos</p>
                        <div class="radio-options search-body">
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="2"> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdQuartos" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        </div>

                        <p class="search-title input-title ">Quantidade de banheiros</p>
                        <div class="radio-options search-body" >
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="2"> <label
                                    for="">2</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="qtdBanheiros" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        </div>
                        <p class="search-title input-title ">Quantidade de vagas</p>
                        <div class="radio-options search-body">
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="1"> <label
                                    for="">1</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="2"> <label
                                    for="">2</label>
    
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="vagas" id="" value="3"> <label
                                    for="">3+</label>
                            </div>
                        </div>
                        <p class="search-title input-title ">Valor</p>
                        <div class="radio-options-column search-body">
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="1"> <label
                                    for="">Até
                                    R$100.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="2"> <label
                                    for="">Entre
                                    R$100.000 e R$300.000</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="valor" id="" value="3"> <label
                                    for="">Mais
                                    que R$300.000</label>
                            </div>
                        </div>
                        <p class="search-title input-title ">Area</p>
                        <div class="radio-options-column search-body">
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="1"> <label
                                    for="">Até
                                    150m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="2"> <label
                                    for="">Entre
                                    150m<sup>2</sup> e 250m<sup>2</sup></label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="area" id="" value="3"> <label
                                    for="">Mais
                                    que 250m<sup>2</sup></label>
                            </div>
                        </div>
                        <button type="submit" class="busca-painel-btn">Procurar</button>
                    </form>
                </div>
            </div>
        @endif
        <div id="pesquisa-result">
            <div id="filtros-container">
                    <h1>Filtros:</h1>
                    @foreach ($filtro as $item)
                    <div class="filtro-content">
                        {{ $item[0] }}: {{ $item[1] }}
                            <form action="/limparFiltroIndidual" method="post">
                                @csrf
                                <input type="hidden" name="filtro" value="{{ $item[0] }}">
                                <button type="submit">X</button>
                            </form>
                        </div>
                    @endforeach
        
                    <form action="/limparFiltro" method="post">
                        @csrf
                        <button type="submit">Limpar Todos</button>
                    </form>
            </div>
            
            <div id="lista-produtos">
                @foreach ($imoveis as $item)
                @if ($item->id != 0)
                        <div class="produto-container">
                            <div class="produto-imagem">
                                @foreach ($imagens as $path)
                                    @if ($item->id == $path->chave)
                                        <div class="img" style="background-image: url('{{ asset($path->path) }}')"></div>
                                        @break
                                    @endif
                                @endforeach
                        </div>
                        <p class="produto-titulo">{{ $item->titulo }}</p>
                        <p class="produto-descricao">{{ $item->descricao }}</p>
                        <div class="produto-dados">
                            <p class="produto-valor">{{ $item->valor }}</p>
                            <p class="produto-vagas">{{ $item->qtdQuartos }}quartos, {{ $item->qtdBanheiros }}banheiros e
                                {{ $item->qtdVagas }} vagas</p>
                        </div>
                        <form action="/imoveis/{{ $item->id }}" method="post">
                            @csrf
                            <input type="hidden" name="idImovel">
                            <button class="produto-saber-mais" type="submit">Detalhe</button>
                        </form>
                    </div>
                    @else
                    <div class="alert alert-success flash-message">
                        <p>Nenhum item encontrado com esse titulo</p>
                    </div>
                    @endif
                    @endforeach
            </div>
        </div>
</div>
<img src="{{ asset('img/pesquisa.svg') }}" alt="" id="mobile-buscar" onclick="abrirPainel()">
<script src="{{ asset('js/mostrarPainel.js') }}"></script>

@endsection
