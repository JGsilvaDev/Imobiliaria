@extends('layouts.font_import')

@section('title','Gerenciador de imóveis')

@section('content')

<link rel="stylesheet" href="{{ asset('css/manager.css') }}">
<script src="{{ asset('js/script.js') }}"></script>

<div id="imovel-header">
    <p id="hello-user">Olá, {{ $usuario->name }}</p>
    <section id="header-botoes">
        <a href="/admin/cadastrar"><button class="nav-btn" id="novo-imovel">Novo imóvel</button></a>
        <form action="logout" method="POST">
            @csrf
            <button class="nav-btn" id="sair" type="submit">Sair</button>
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
                        @if($paths[0]->id != 0)
                            @foreach ($paths as $path)
                                @if($item->id == $path->id)
                                    <img src="{{ env('APP_URL') }}{{asset($path->path)}}" alt="Imagem">
                                    @break
                                @endif
                            @endforeach
                        @endif

                        <section id="informacoes">
                            <p id="imovel-titulo">{{ $item->titulo }}l</p>
                            <p id="imovel-valor"><p>R$ {{ $item->valor }}</p></p>
                        </section>

                        <section id="imovel-botoes">
                            <form action="admin/edit/{{ $item->id }}" method="post">
                                @csrf
                                <button type="submit" id="imovel-editar" class="imovel-btn"><img src="./img/add.svg" alt="" class="btn-icon"><span class="btn-texto">editar</span></button>
                            </form>

                            <form action="/deletar/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="imovel-remover" class="imovel-btn"><img src="./img/remover.svg" alt="" class="btn-icon"><span class="btn-texto">remover</span></button>
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
    <div class="alert alert-success flash-message">
        {{ session('success') }}
    </div>
@endif

@if(session('editado'))
    <div class="alert alert-success flash-message">
        {{ session('editado') }}
    </div>
@endif

@if(session('excluir'))
    <div class="alert alert-success flash-message">
        {{ session('excluir') }}
    </div>
@endif
