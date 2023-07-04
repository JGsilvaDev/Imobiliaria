@extends('layouts.font_import')

@section('title','Gerenciador de imóveis')

@section('content')

<link rel="stylesheet" href="{{ asset('css/manager.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/dropDown.js') }}"></script>
<script src="{{ asset('js/reload.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="imovel-header">
    <p id="hello-user">Olá, {{ $usuario->name }}</p>
    <section id="header-botoes">
        <a href="/admin/cadastrar"><button class="nav-btn" id="novo-imovel">Novo imóvel</button></a>
        <select name="opcao" class="nav-btn" id="dropdown">
            <option disabled selected>Editar</option>
            @foreach ($opcoes as $op)
                <option value="{{ $op->id }}" id="{{ $op->id }}">{{ $op->name }}</option>
            @endforeach
        </select>

        <form action="logout" method="POST">
            @csrf
            <button class="nav-btn" id="sair" type="submit" style="display: none"></button>
        </form>
    </section>

</div>

<div id="pesquisa">
    <form action="admin" method="post">
        @csrf
        <input type="text" name="search" id="search" placeholder="Pesquisar imóvel">
    </form>
</div>

@if($itens)
    @foreach($itens as $item)
        <div id="imoveis-lista">
            <div class="imovel-container">
                <div class="imovel-content">
                    <section id="content-num-001" class="content-info">
                        @if($paths[0]->chave != 0)
                            @foreach ($paths as $path)
                                @if($item->id == $path->chave)
                                    <div class="img" style="background-image: url('{{asset($path->path)}}')"></div>
                                    @break
                                @endif
                            @endforeach
                        @endif

                        <section id="informacoes">
                            <p id="imovel-titulo">{{ $item->titulo }}</p>
                            <p id="imovel-valor"><p>R$ {{ $item->valor }}</p></p>
                        </section>

                        <section id="imovel-botoes">
                            <form action="admin/edit/{{ $item->id }}" method="post">
                                @csrf
                                <button type="submit" id="imovel-editar" class="imovel-btn"><img src="{{ asset('img/add.svg')}}" alt="" class="btn-icon"><span class="btn-texto">Editar</span></button>
                            </form>

                            <button id="imovel-remover" onclick="excluir();" class="imovel-btn"><img src="{{ asset('img/remover.svg')}}" alt="" class="btn-icon"><span class="btn-texto">Remover</span></button>

                            <form action="/deletar/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="remover" class="imovel-btn" style="display: none"></button>
                            </form>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    @endforeach
@endif

{{-- <div id="conteudo">
    <p>{{ $item->id }}</p>
    <p>{{ $item->descricao }}</p>
    <p>{{ $item->area }}</p>
</div> --}}


@if(session('success'))
    <div class="alert alert-success" id="flash-message">
        {{ session('success') }}
    </div>
@endif

@if(session('editado'))
    <div class="alert alert-success" id="flash-message">
        {{ session('editado') }}
    </div>
@endif

@if(session('excluir'))
    <div class="alert alert-success" id="flash-message">
        {{ session('excluir') }}
    </div>
@endif
