@extends('layouts.main_login')

@section('title','Gerenciador de imóveis')

@section('content')

<link rel="stylesheet" href="{{ asset('css/manager.css') }}">
<script src="{{ asset('js/script.js') }}"></script>

<div id="imovel-header">
    <p id="hello-user">Olá, usuário</p>
    <section id="header-botoes">
        <button class="nav-btn" id="novo-imovel">Novo imóvel</button>
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

<div id="imoveis-lista">
    <div class="imovel-container">
        <div class="imovel-content">
            <section id="content-num-001" class="content-info">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/35/Neckertal_20150527-6384.jpg" alt="ícone" id="imovel-img">

                <section id="informacoes">
                    <p id="imovel-titulo">Título do imóvel</p>
                    <p id="imovel-valor">R$20.000,00</p>
                </section>

                <section id="imovel-botoes">
                    <button id="imovel-editar" class="imovel-btn"><img src="./img/add.svg" alt="" class="btn-icon"><span class="btn-texto">editar</span></button>
                    <button id="imovel-remover" class="imovel-btn"><img src="./img/remover.svg" alt="" class="btn-icon"><span class="btn-texto">remover</span></button>
                </section>
            </section>
        </div>
    </div>
</div>


@if($itens)
    @foreach($itens as $item)
    <div id="conteudo">
        <p>{{ $item->id }}</p>
        <p>{{ $item->titulo }}</p>
        <p>{{ $item->descricao }}</p>
        <p>{{ $item->area }}</p>
        <p>{{ $item->valor }}</p>

        @if($paths[0]->id != 0)
            @foreach ($paths as $path)
                @if($item->id == $path->id)
                    <img src="{{ env('APP_URL') }}{{asset($path->path)}}" alt="Imagem">
                    @break
                @endif
            @endforeach
        @endif

        <form action="admin/edit/{{ $item->id }}" method="post">
            @csrf
            <button type="submit">Editar</button>
        </form>

        <form action="/deletar/{{ $item->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button id="btnDelete">Deletar</button>
            {{-- onclick="deletar(this)" --}}
        </form>
    </div>
    @endforeach
@endif

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

@if(session('id'))
    <div class="alert alert-danger">
        Usuario id: {{ session('id') }}
    </div>
@endif


