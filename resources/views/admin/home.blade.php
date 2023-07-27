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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div id="imovel-header">
    <p id="hello-user">Olá, {{ $usuario->name }}</p>
    <section id="header-botoes">
        <button class="nav-btn" id="novo-imovel" onclick="window.location.href='/admin/cadastrar'">Adicionar</button>

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

<div id="pesquisa"> {{--div pai--}}
    <form action="admin" method="post">
        @csrf
        <div class="search-container"> {{--div filho--}}
            <input type="text" name="search" id="search" placeholder="Pesquisar imóvel">
            <button type="submit" id="search-button"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>

@if($itens)
        <div id="imoveis-lista">
            @foreach($itens as $item)
            <div class="imovel-container">
                <div class="imovel-content">
                    <section id="content-num-001" class="content-info">
                        @if($paths[0]->chave != 0)
                            @foreach ($paths as $path)
                                @if($item->id == $path->chave)
                                    <div class="img produto-item-flex" style="background-image: url('{{asset($path->path)}}')"></div>
                                @endif
                            @endforeach
                        @endif

                        <section id="informacoes" class="produto-item-flex">
                            <p id="imovel-titulo">{{ $item->titulo }}</p>
                            <p id="imovel-descricao">{{ $item->descricao }}</p>
                            <p id="imovel-valor">R$ {{ $item->valor }}</p>
                        </section>

                        <section id="imovel-botoes" class="produto-item-flex">
                            <form action="admin/edit/{{ $item->id }}" method="post" id="imovel-editar" class="imovel-btn">
                                @csrf
                                <button type="submit" id="imovel-editar-btn" class="imovel-btn">
                                <span class="btn-texto">Editar</span></button>
                            </form>

                            <button id="imovel-remover" onclick="excluir();" class="imovel-btn">
                            <span class="btn-texto">Remover</span></button>

                            <form action="/deletar/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="remover" class="imovel-btn" style="display: none"></button>
                            </form>
                        </section>
                    </section>
                </div>
            </div>
            @endforeach
        </div>
@endif

<div id="admin-footer">
    <div class="img_footer" style="background-image: url({{ asset('img/logo.png') }})"></div>
</div>

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
